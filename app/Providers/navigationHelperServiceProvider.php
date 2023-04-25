<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class navigationHelperServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        require_once app_path('Helpers/navigation-helper.php');
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
