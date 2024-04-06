<?php

namespace App\Filament\Pages;

use App\Livewire\RepeaterTestComponent;
use Filament\Actions\Action;
use Filament\Pages\Page;

class RepeaterTestPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.repeater-test-page';

    protected static ?string $navigationLabel = 'Repeater Test Page';

    protected function getHeaderActions(): array
    {
        return [
            Action::make('save_form')
                ->label('Save')
                ->action(function ($livewire) {
                    $livewire->dispatch('formSubmitted', RepeaterTestComponent::class);
                })
        ];
    }
}
