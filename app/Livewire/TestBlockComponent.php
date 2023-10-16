<?php

namespace App\Livewire;

use Filament\Actions\Action;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class TestBlockComponent extends Component implements HasForms, HasActions
{
    use InteractsWithActions;
    use InteractsWithForms;

    public array $data = [];

    public function mount(): void
    {
//        $this->form->fill();
    }
//
//    public function form(Form $form): Form
//    {
//        return $form
//            ->schema([
//                TextInput::make('name')
//            ])
//            ->statePath('data');
//    }

    public function TestAction(): Action
    {
        return Action::make('test')
            ->form([
                TextInput::make('name')
            ])
            ->fillForm($this->data)
            ->action(fn ($data) => $this->data = $data);
    }

    #[On('close-modal')]
    public function updateEditorBlock(): void
    {
        $this->dispatch('update-block', data: $this->data);
    }

    public function render(): View
    {
        return view('livewire.test-block-component');
    }
}
