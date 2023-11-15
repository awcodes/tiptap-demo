<?php

namespace App\Providers;

use App\TiptapBlocks\BatmanBlock;
use App\TiptapBlocks\StaticBlock;
use App\TiptapBlocks\VideoBlock;
use FilamentTiptapEditor\TiptapEditor;
use Illuminate\Support\ServiceProvider;

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
            $component
                ->blocks([
                    BatmanBlock::class,
                    StaticBlock::class,
                    VideoBlock::class,
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
    }
}
