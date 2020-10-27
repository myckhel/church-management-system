<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Church;
use App\Observers\ChurchObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      Church::observe(ChurchObserver::class);
    }
}
