<?php

namespace App\Providers;

use Filament\Support\Facades\FilamentView;
use Illuminate\Support\Facades\Blade;
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
        FilamentView::registerRenderHook(
            'panels::body.end',
            fn() => Blade::render('@stack("modals")')
        );
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
