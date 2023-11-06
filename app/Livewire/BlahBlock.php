<?php

namespace App\Livewire;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class BlahBlock extends Component implements HasForms
{
    use InteractsWithForms;

    public array $data = [];

    public function mount($data): void
    {
        $this->form->fill($data);
    }

    public function form(Form $form): Form
    {
        return $form
            ->statePath('data')
            ->schema([
                TextInput::make('name'),
                TextInput::make('color'),
            ]);
    }

    public function create(): void
    {
        $data = $this->form->getState();

        $preview = view('blocks.blah-block', [
            'name' => $data['name'] ?? 'not set',
            'color' => $data['color'] ?? 'not set'
        ])->render();

        $this->dispatch('close-modal', id: 'tiptap-bus', data: $data, preview: $preview);
    }

    public function render(): View
    {
        return view('livewire.blah-block');
    }
}
