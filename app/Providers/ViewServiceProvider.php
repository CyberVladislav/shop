<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\MainSetting;

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
            $socialPhotos = MainSetting::where('name', 'socialPhoto')->get();
            $instaLink = MainSetting::where('name', 'instaLink')->first();
            $vkLink = MainSetting::where('name', 'vkLink')->first();
            $facebookLink = MainSetting::where('name', 'facebookLink')->first();
            $twitterLink = MainSetting::where('name', 'twitterLink')->first();
            $copyRight = MainSetting::where('name', 'copyRight')->first();
            $aboutUs = MainSetting::where('name', 'aboutUs')->first();
            
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
