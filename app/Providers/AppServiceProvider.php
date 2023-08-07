<?php

namespace App\Providers;

use FilamentVersions\Facades\FilamentVersions;
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
//        FilamentVersions::registerNavigationView(true);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        config()->set('filament-peek.builderEditor.sidebarInitialWidth', '50vw');
    }
}
