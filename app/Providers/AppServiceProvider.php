<?php

namespace App\Providers;

use App\TiptapBlocks\BatmanBlock;
use FilamentTiptapEditor\TiptapEditor;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        TiptapEditor::configureUsing(function (TiptapEditor $component) {
            $component->blocks([
                'batman-block' => BatmanBlock::class
            ]);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        config()->set('filament-peek.builderEditor.sidebarInitialWidth', '50vw');

        Livewire::component('batman-block', BatmanBlock::class);
    }
}
