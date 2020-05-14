<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\User;
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
        $schedule->call(function () {
            $user = User::with('books')->whereHas('books', function ($query) {
                $query->where('returned_at', NULL);
            })->get();
            foreach ($user as $user) {
                foreach ($user->books as $book) {
                    if (Carbon::now() >= $book->pivot->ends_at) {
                        $book->pivot->update(['returned_at' => Carbon::now()]);
                    }
                }
            }
        })->everyMinute();
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
