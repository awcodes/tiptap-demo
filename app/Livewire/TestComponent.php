<?php

namespace App\Livewire;

use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Components\Actions;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use FilamentTiptapEditor\Enums\TiptapOutput;
use FilamentTiptapEditor\TiptapEditor;
use Livewire\Component;

class TestComponent extends Component implements HasForms, HasActions
{
    use InteractsWithForms;
    use InteractsWithActions;

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->statePath('data')
            ->schema([
                Actions::make([
                    Action::make('test_modal_content')
                        ->form([
                            TiptapEditor::make('modal_content')
                                ->output(TiptapOutput::Json)
                                ->columnSpanFull(),
                        ])
                ]),
                TiptapEditor::make('content')
                    ->output(TiptapOutput::Json)
                    ->columnSpanFull()
            ])
            ->columns(1);
    }

    public function render()
    {
        return view('livewire.test-component');
    }
}
