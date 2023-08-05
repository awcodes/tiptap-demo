<?php

namespace App\Filament\Pages;

use App\Livewire\Sink;
use Filament\Actions\Action;
use Filament\Pages\Page;

class TestPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.test-page';

    protected static ?string $navigationLabel = 'Tiptap Editor';

    protected function getHeaderActions(): array
    {
        return [
            Action::make('save_form')
                ->label('Save')
                ->action(function ($livewire) {
                    $livewire->dispatch('formSubmitted', Sink::class);
                })
        ];
    }
}
