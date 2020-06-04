<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Loan;
use Carbon\Carbon;

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
        $schedule->command('notifications:send')->daily();

        // Otomatis mengembalikan buku
        $loans = Loan::active()->get();
        if ($loans->isNotEmpty()) {
            $schedule->call(function () use ($loans) {
                foreach ($loans as $loan) {
                    if (Carbon::now() >= $loan->ends_at) {
                        $loan->update(['returned_at' => Carbon::now()]);
                    }
                }
            })->everyMinute();
        }

        $schedule->command('sitemap:generate')->daily();
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
