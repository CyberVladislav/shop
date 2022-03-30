<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;

class VarsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('layouts.base', 'App\Providers\ViewComposers\BaseComposer');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
