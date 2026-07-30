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


        $quality = strtolower(trim($quality));

        $qualityMap = [

            'extreme' => [
                'setting' => '/screen',
                'color_resolution' => 72,
                'gray_resolution' => 72,
                'mono_resolution' => 96,
                'jpeg' => 32
            ],


            'recommended' => [
                'setting' => '/ebook',
                'color_resolution' => 110,
                'gray_resolution' => 110,
                'mono_resolution' => 150,
                'jpeg' => 58
            ],


            'less' => [
                'setting' => '/printer',
                'color_resolution' => 220,
                'gray_resolution' => 220,
                'mono_resolution' => 300,
                'jpeg' => 85
            ],

        ];


        $config = $qualityMap[$quality]
            ?? $qualityMap['recommended'];



        $gsBinary = $this->resolveGhostscriptBinary();

        $command = sprintf(
'%s -sDEVICE=pdfwrite -dCompatibilityLevel=1.4 -dPDFSETTINGS=%s -dNOPAUSE -dBATCH -dSAFER -dDetectDuplicateImages=true -dCompressFonts=true -dSubsetFonts=true -dAutoFilterColorImages=false -dAutoFilterGrayImages=false -dColorImageFilter=/DCTEncode -dGrayImageFilter=/DCTEncode -dJPEGQ=%d -dDownsampleColorImages=true -dColorImageDownsampleType=/Bicubic -dColorImageResolution=%d -dDownsampleGrayImages=true -dGrayImageDownsampleType=/Bicubic -dGrayImageResolution=%d -dDownsampleMonoImages=true -dMonoImageDownsampleType=/Subsample -dMonoImageResolution=%d -sOutputFile=%s %s 2>&1',

$gsBinary,
$config['setting'],
$config['jpeg'],
$config['color_resolution'],
$config['gray_resolution'],
$config['mono_resolution'],
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

    private function resolveGhostscriptBinary(): string
    {
        $candidates = PHP_OS_FAMILY === 'Windows'
            ? [
                env('GHOSTSCRIPT_PATH'),
                'C:\\Program Files\\gs\\gs10.05.1\\bin\\gswin64c.exe',
                'C:\\Program Files\\gs\\gs10.05.0\\bin\\gswin64c.exe',
                'C:\\Program Files\\gs\\gs10.04.0\\bin\\gswin64c.exe',
                'C:\\Program Files\\gs\\gs10.03.1\\bin\\gswin64c.exe',
                'C:\\Program Files\\gs\\gs10.03.0\\bin\\gswin64c.exe',
                'C:\\Program Files\\gs\\gs10.02.1\\bin\\gswin64c.exe',
                'C:\\Program Files\\gs\\gs10.02.0\\bin\\gswin64c.exe',
                'C:\\Program Files\\gs\\gs10.01.2\\bin\\gswin64c.exe',
                'C:\\Program Files\\gs\\gs10.01.1\\bin\\gswin64c.exe',
                'C:\\Program Files\\gs\\gs10.01.0\\bin\\gswin64c.exe',
                'C:\\Program Files\\gs\\gs10.00.0\\bin\\gswin64c.exe',
                'C:\\Program Files (x86)\\gs\\gs10.05.1\\bin\\gswin32c.exe',
                'gswin64c',
                'gswin32c',
            ]
            : [
                env('GHOSTSCRIPT_PATH'),
                '/usr/bin/gs',
                '/usr/local/bin/gs',
                'gs',
            ];

        foreach (array_filter($candidates) as $candidate) {
            if (str_contains($candidate, DIRECTORY_SEPARATOR) && file_exists($candidate)) {
                return escapeshellarg($candidate);
            }

            if (!str_contains($candidate, DIRECTORY_SEPARATOR)) {
                $lookupCommand = PHP_OS_FAMILY === 'Windows'
                    ? 'where ' . escapeshellarg($candidate) . ' 2>NUL'
                    : 'command -v ' . escapeshellarg($candidate) . ' 2>/dev/null';

                $found = trim((string) shell_exec($lookupCommand));

                if ($found !== '') {
                    return $candidate;
                }
            }
        }

        throw new Exception(
            'Ghostscript is not installed on this server. Please install Ghostscript or set GHOSTSCRIPT_PATH in .env.'
        );
    }

}
