<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Setting;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer ('layouts.base', function ($view)
        {
            $socialPhotos = Setting::where('name', 'socialPhoto')->get();
            $instaLink = Setting::where('name', 'instaLink')->first();
            $vkLink = Setting::where('name', 'vkLink')->first();
            $facebookLink = Setting::where('name', 'facebookLink')->first();
            $twitterLink = Setting::where('name', 'twitterLink')->first();
            $copyRight = Setting::where('name', 'copyRight')->first();
            $aboutUs = Setting::where('name', 'aboutUs')->first();
            
            $view->with([
                'socialPhotos' => $socialPhotos,
                'vkLink' => $vkLink,
                'facebookLink' => $facebookLink,
                'twitterLink' => $twitterLink,
                'instaLink' => $instaLink,
                'copyRight' => $copyRight,
                'aboutUs' => $aboutUs,
                ]);
        });
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
