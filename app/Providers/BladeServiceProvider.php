<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\DB;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('greet', function ($user) {
            return "Hello {$user}";
        });

        Blade::directive('productsCount', function ($user) {
            $productsCount = DB::table('products')->count();
            return $productsCount;
        });
    }
}
