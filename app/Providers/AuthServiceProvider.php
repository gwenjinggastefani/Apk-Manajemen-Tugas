<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    public function boot()
    {
        $this->registerPolicies();

        

        // Gate untuk Manager
        Gate::define('isManager', function (User $user) {
            return $user->role === 'manager';
        });

        // Gate untuk User
        Gate::define('isUser', function (User $user) {
            return $user->role === 'user';
        });
    }
}
