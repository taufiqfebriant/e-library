<?php

namespace App\Console\Commands;

use App\Notifications\SubscriptionExpirationReminder;
use App\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class SendNotifications extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notifications:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send all notifications';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $users = User::whereHas('subscription', function ($query) {
            $query->whereDate(DB::raw("DATE_FORMAT(ends_at, '%Y-%m-%d')"), '=', Carbon::now()->addDays(3)->format('Y-m-d'));
        })->get();
        foreach ($users as $user) {
            $user->notify(new SubscriptionExpirationReminder());
        }
    }
}
