<?php

namespace App\Providers;

use App\Models\Quater;
use App\Observers\QuaterObserver;
use Illuminate\Support\ServiceProvider;

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
        Quater::observe(QuaterObserver::class);
    }
}
