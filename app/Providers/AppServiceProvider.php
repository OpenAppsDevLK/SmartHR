<?php

namespace App\Providers;

//import the pagination class.
use Illuminate\Pagination\Paginator;
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
        //To fix the pagination use this code.
        Paginator::useBootstrap();

    }
}
