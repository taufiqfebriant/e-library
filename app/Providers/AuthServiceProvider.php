<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('show-user', function ($user, $user2) {
            return $user->id === $user2->id;
        });

        Gate::define('update-transaction', function ($user, $transaction) {
            return $user->id === $transaction->user_id;
        });

        Gate::define('manage-users', function ($user){
            return $user->hasRole('admin');
        });

        Gate::define('edit-users', function ($user){
            return $user->hasRole('admin');
        });

        Gate::define('delete-users', function ($user){
            return $user->hasRole('admin');
        });
    }
}
