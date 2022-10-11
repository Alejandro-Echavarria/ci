<?php

namespace App\Providers;

use App\Models\Quater;
use App\Models\User;
use App\Observers\QuaterObserver;
use App\Observers\UserObserver;
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
        User::observe(UserObserver::class);
    }
}
