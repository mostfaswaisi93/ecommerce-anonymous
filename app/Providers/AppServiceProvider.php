<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;

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
        $path = 'public/admin';
        View::share('css_path', $path . '/css');
        View::share('js_path', $path . '/js');
        View::share('img_path', $path . '/img');
        View::share('plugin_path', $path . '/plugins');
    }
}
