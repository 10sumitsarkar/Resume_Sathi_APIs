<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
 protected function schedule(Schedule $schedule)
{
    $schedule->call(function () {

        $folders = [

            storage_path('app/temp'),

            storage_path('app/public/pdf')

        ];

        foreach($folders as $folder){

            if(!is_dir($folder)){
                continue;
            }

            $files = glob($folder.'/*');

            foreach($files as $file){

                if(
                    is_file($file) &&
                    time() - filemtime($file) > 3 * 60 * 60
                ){

                    unlink($file);

                }

            }

        }

    })->hourly();
}

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
