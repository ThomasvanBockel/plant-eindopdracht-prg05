<?php

namespace App\Providers;

use App\Models\Plant;

//use Illuminate\Auth\Access\Gate;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('edit-check', function (User $user, Plant $plant) {
            return $plant->user->is($user);
        });
        
        Gate::define('delete-check', function (User $user, Plant $plant) {
            return $plant->user->is($user);
        });
    }
}
