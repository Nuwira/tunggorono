<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Dusk\DuskServiceProvider;

class LaravelDuskServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        if (! $this->app->environment('production')) {
            $this->app->register(DuskServiceProvider::class);
        }
    }
}
