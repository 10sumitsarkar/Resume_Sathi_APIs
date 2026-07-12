<?php

namespace App\Services;

use Exception;

class PdfCompressionService
{

    public function compress(
        string $input,
        string $output,
        string $quality = 'recommended'
    ): void {


$qualityMap = [

    'extreme' => [
        'setting' => '/screen',
        'resolution' => 72,
        'jpeg' => 40
    ],


    'recommended' => [
        'setting' => '/ebook',
        'resolution' => 96,
        'jpeg' => 55
    ],


    'less' => [
        'setting' => '/printer',
        'resolution' => 150,
        'jpeg' => 75
    ],

];


        $config = $qualityMap[$quality]
            ?? $qualityMap['recommended'];



$command = sprintf(
'/usr/bin/gs -sDEVICE=pdfwrite -dCompatibilityLevel=1.4 -dPDFSETTINGS=%s -dNOPAUSE -dBATCH -dSAFER -dAutoFilterColorImages=false -dColorImageFilter=/DCTEncode -dJPEGQ=%d -dDownsampleColorImages=true -dColorImageResolution=%d -dDownsampleGrayImages=true -dGrayImageResolution=%d -sOutputFile=%s %s 2>&1',

$config['setting'],
$config['jpeg'],
$config['resolution'],
$config['resolution'],
escapeshellarg($output),
escapeshellarg($input)
);



        exec($command, $logs, $returnCode);



        if ($returnCode !== 0) {

            throw new Exception(
                "Ghostscript failed:\n" .
                implode("\n", $logs)
            );

        }



        if (!file_exists($output)) {

            throw new Exception(
                "Compressed PDF not generated"
            );

        }

    }

}