<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PdfCompressionService;
use Illuminate\Support\Str;

class PdfController extends Controller
{

    public function compress(
        Request $request,
        PdfCompressionService $compressor
    )
    {

        $request->validate([

            'pdf' => [
                'required',
                'file',
                'mimes:pdf',
                'max:51200'
            ],

            'quality'=>[
                'nullable',
                'in:extreme,recommended,less,screen,ebook,printer,prepress'
            ],

            'compression'=>[
                'nullable',
                'in:extreme,recommended,less,screen,ebook,printer,prepress'
            ],

            'level'=>[
                'nullable',
                'in:extreme,recommended,less,screen,ebook,printer,prepress'
            ]

        ]);



        $file = $request->file('pdf');


        $filename = Str::uuid();



        $tempFolder = storage_path('app/temp');



        if(!file_exists($tempFolder)){

            mkdir(
                $tempFolder,
                0755,
                true
            );

        }



        $inputPath = $tempFolder.'/'.$filename.'.pdf';


        $outputPath = $tempFolder.'/'.$filename.'_compressed.pdf';



        // Move uploaded PDF

        $file->move(
            $tempFolder,
            $filename.'.pdf'
        );



        // Check uploaded file

        if(!file_exists($inputPath)){


            return response()->json([

                "success"=>false,

                "message"=>"Uploaded PDF not found",

                "path"=>$inputPath

            ],500);


        }



        $quality = $this->normalizeCompressionLevel(
            $request->input('quality')
                ?? $request->input('compression')
                ?? $request->input('level')
                ?? 'recommended'
        );



        try {


            $compressor->compress(

                $inputPath,

                $outputPath,

                $quality

            );


        }
        catch(\Exception $e){


            return response()->json([

                "success"=>false,

                "message"=>$e->getMessage(),

                "input"=>$inputPath,

                "output"=>$outputPath

            ],500);


        }





        if(!file_exists($outputPath)){


            return response()->json([

                "success"=>false,

                "message"=>"Compressed PDF not created"

            ],500);


        }




        $originalSize = filesize($inputPath);

        $compressedSize = filesize($outputPath);



        // Use compressed only if smaller

        if($compressedSize < $originalSize){

            $finalFile = $outputPath;

        }
        else{

            $finalFile = $inputPath;

            $compressedSize = $originalSize;

        }





        // Public download folder


        $downloadName = $filename.'.pdf';


        $downloadFolder = storage_path(
            'app/public/pdf'
        );



        if(!file_exists($downloadFolder)){


            mkdir(
                $downloadFolder,
                0755,
                true
            );


        }



        copy(

            $finalFile,

            $downloadFolder.'/'.$downloadName

        );




        return response()->json([


            "success"=>true,


            "original_size"=>$this->formatSize($originalSize),


            "compressed_size"=>$this->formatSize($compressedSize),


            "saved_percentage"=>$this->calculateSaved(
                $originalSize,
                $compressedSize
            ),


          "download_url"=>url(
    '/api/pdf/download/'.$downloadName
)

        ]);



    }





    private function formatSize($bytes)
    {

        if($bytes >= 1024*1024){

            return round(
                $bytes/(1024*1024),
                2
            )." MB";

        }


        return round(
            $bytes/1024,
            2
        )." KB";

    }





    private function calculateSaved(
        $original,
        $compressed
    )
    {

        if($compressed >= $original){

            return "0%";

        }


        return round(
            (($original-$compressed)/$original)*100
        )."%";


    }

    private function normalizeCompressionLevel($quality)
    {
        return match ($quality) {
            'screen' => 'extreme',
            'ebook' => 'recommended',
            'printer', 'prepress' => 'less',
            'extreme', 'recommended', 'less' => $quality,
            default => 'recommended',
        };
    }
    
    public function download($file)
{
    $path = storage_path('app/public/pdf/' . $file);

    if (!file_exists($path)) {
        abort(404);
    }

    return response()->download($path);
}


}
