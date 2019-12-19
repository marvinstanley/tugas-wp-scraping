<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Information;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            $html = "";
            $url = "http://rss.detik.com/index.php/detikcom_nasional";
            $contents = array();
            $xml = simplexml_load_file($url);
            for($i = 0; $i < 8; $i++) {
                $content = $xml->channel->item[$i];
                $data = new Information;
                $data->title = $content->title;
                $data->thumbnail = substr($content->description, 10 , strpos($content->description, "\" align=\"left\" hspace=\"7\" width=\"100\" />") - 10 );
                $data->description = substr($content->description, strpos($content->description, "/>")+2 , strlen($content->description)-strpos($content->description,"/>") );
                $data->links = $content->link;
                $data->save();
            }
        // Command ini akan dijalankan setiap 3 jam
        })->cron('0 */3 * * *');

        // })->everyMinute();
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
