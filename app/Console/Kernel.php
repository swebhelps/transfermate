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

    protected $commands = [
                                Commands\XMLcron::class,
                          ];


    protected function schedule(Schedule $schedule)
    {
       /* $schedule->command($this->getQueueCommand())
                ->everyMinute()
                ->withoutOverlapping();*/
                
        $schedule->command('command:XMLcron')
                  ->everyMinute();

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

    protected function getQueueCommand()
    {
        // build the queue command
        $params = implode(' ',[
            '--daemon',
            '--tries=3',
            '--sleep=3',
        ]);

        return sprintf('queue:work %s', $params);
    }
}
