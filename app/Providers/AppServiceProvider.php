<?php

namespace App\Providers;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->booted(
            fn () => Artisan::call('app:startup')
        );

        Blade::if('isAdmin', function () {
            $adminRoles = 'super-admin|admin';
            return Auth::check() && Auth::user()->hasRole($adminRoles);  // Adjust this condition to match your logic
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
