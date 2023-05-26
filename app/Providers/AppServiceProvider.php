<?php

namespace App\Providers;

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
        define("API_TOKEN", 'yLB0DUMIexVd48jjojWnBXM7nRyXF0gfDOOqQjYNeSNCateomsVUqFf4qBemkyULCvXFeZHeu8KcidiR99d2Kc4KYsmw8r1DoRFJ');
    }
}
