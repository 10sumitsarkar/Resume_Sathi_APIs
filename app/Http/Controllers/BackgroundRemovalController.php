<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BackgroundRemovalController extends Controller
{
    public function remove(Request $request)
    {
        $request->validate([
            'image' => ['required', 'file', 'mimes:jpg,jpeg,png,webp', 'max:12288'],
        ]);

        $apiKey = config('services.remove_bg.key');
        if (!$apiKey) {
            try {
                return $this->removeWithGd($request->file('image'));
            } catch (\Throwable $exception) {
                report($exception);

                return response()->json([
                    'success' => false,
                    'message' => 'Local background removal failed. Make sure the PHP GD extension is enabled.',
                ], 500);
            }
        }

        $image = $request->file('image');

        try {
            $response = Http::timeout(90)
                ->withHeaders(['X-Api-Key' => $apiKey])
                ->attach(
                    'image_file',
                    file_get_contents($image->getRealPath()),
                    $image->getClientOriginalName()
                )
                ->post('https://api.remove.bg/v1.0/removebg', [
                    'size' => 'auto',
                    'format' => 'png',
                ]);
        } catch (\Throwable $exception) {
            report($exception);

            return response()->json([
                'success' => false,
                'message' => 'Background removal service could not be reached. Please try again.',
            ], 502);
        }

        if (!$response->successful()) {
            return response()->json([
                'success' => false,
                'message' => $response->json('errors.0.title')
                    ?? 'The background removal service rejected this image.',
            ], $response->status() === 402 ? 402 : 422);
        }

        return response($response->body(), 200, [
            'Content-Type' => 'image/png',
            'Content-Disposition' => 'inline; filename="removed-background.png"',
            'Cache-Control' => 'no-store',
        ]);
    }

    private function removeWithGd($file)
    {
        $imageInfo = getimagesize($file->getRealPath());
        $imageType = $imageInfo[2] ?? null;
        $image = match ($imageType) {
            IMAGETYPE_JPEG => imagecreatefromjpeg($file->getRealPath()),
            IMAGETYPE_PNG => imagecreatefrompng($file->getRealPath()),
            IMAGETYPE_WEBP => imagecreatefromwebp($file->getRealPath()),
            default => false,
        };

        if (!$image) {
            throw new \RuntimeException('Unsupported image format');
        }

        imagealphablending($image, false);
        imagesavealpha($image, true);
        $width = imagesx($image);
        $height = imagesy($image);
        $pixelCount = $width * $height;
        $visited = str_repeat("\0", $pixelCount);
        $queue = new \SplQueue();
        $samples = [
            imagecolorat($image, 0, 0),
            imagecolorat($image, $width - 1, 0),
            imagecolorat($image, 0, $height - 1),
            imagecolorat($image, $width - 1, $height - 1),
        ];
        $tolerance = 62;

        $enqueue = function ($x, $y) use (&$enqueue, $queue, &$visited, $width, $height) {
            if ($x < 0 || $x >= $width || $y < 0 || $y >= $height) {
                return;
            }
            $index = ($y * $width) + $x;
            if (ord($visited[$index]) === 1) {
                return;
            }
            $visited[$index] = "\1";
            $queue->enqueue([$x, $y]);
        };

        $enqueue(0, 0);
        $enqueue($width - 1, 0);
        $enqueue(0, $height - 1);
        $enqueue($width - 1, $height - 1);

        while (!$queue->isEmpty()) {
            [$x, $y] = $queue->dequeue();
            $color = imagecolorat($image, $x, $y);
            $red = ($color >> 16) & 255;
            $green = ($color >> 8) & 255;
            $blue = $color & 255;
            $matchesBackground = false;

            foreach ($samples as $sample) {
                $sampleRed = ($sample >> 16) & 255;
                $sampleGreen = ($sample >> 8) & 255;
                $sampleBlue = $sample & 255;
                $distance = sqrt(($red - $sampleRed) ** 2 + ($green - $sampleGreen) ** 2 + ($blue - $sampleBlue) ** 2);
                if ($distance <= $tolerance) {
                    $matchesBackground = true;
                    break;
                }
            }

            if (!$matchesBackground) {
                continue;
            }

            imagesetpixel($image, $x, $y, imagecolorallocatealpha($image, $red, $green, $blue, 127));
            $enqueue($x - 1, $y);
            $enqueue($x + 1, $y);
            $enqueue($x, $y - 1);
            $enqueue($x, $y + 1);
        }

        ob_start();
        imagepng($image, null, 6);
        $png = ob_get_clean();
        imagedestroy($image);

        return response($png, 200, [
            'Content-Type' => 'image/png',
            'Content-Disposition' => 'inline; filename="removed-background.png"',
            'Cache-Control' => 'no-store',
        ]);
    }
}
