<?php

namespace App\Livewire;

use Filament\Actions\Action;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use FilamentTiptapEditor\CustomBlock;

class TestBlockComponent extends CustomBlock implements HasForms, HasActions
{
    use InteractsWithActions;
    use InteractsWithForms;

    protected string $view = 'livewire.test-block-component';

    public function TestAction(): Action
    {
        return Action::make('test')
            ->form([
                TextInput::make('name'),
                TextInput::make('suit_color')
            ])
            ->fillForm($this->data)
            ->action(function ($data) {
                $this->data = $data;
            });
    }
}
