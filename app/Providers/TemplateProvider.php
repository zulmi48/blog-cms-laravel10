<?php

namespace App\Providers;

use App\Models\Configuration;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class TemplateProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('frontend.layouts.app', function ($view) {

            $configKeys = [
                'logo',
                'blogname',
                'title',
                'caption',
                'ads_header',
                'ads_widget',
                'ads_footer',
                'phone',
                'email',
                'facebook',
                'instagram',
                'youtube',
                'footer',
            ];

            $config = Configuration::whereIn('name', $configKeys)->pluck('value', 'name');

            $view->with('config', $config);
        });
    }
}
