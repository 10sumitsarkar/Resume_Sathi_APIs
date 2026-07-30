<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with their IO methods.
|
*/


Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');



/*
|--------------------------------------------------------------------------
| Auto Delete Temporary PDF Files
|--------------------------------------------------------------------------
*/


Schedule::call(function () {

    $folders = [

        storage_path('app/temp'),

        storage_path('app/public/pdf')

    ];


    foreach ($folders as $folder) {


        if (!is_dir($folder)) {
            continue;
        }


        $files = glob($folder . '/*');


        foreach ($files as $file) {


            if (
                is_file($file) &&
                time() - filemtime($file) > 3 * 60 * 60
            ) {

                unlink($file);

            }

        }

    }


})->hourly();