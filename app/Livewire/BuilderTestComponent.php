<?php

namespace App\Livewire;

use App\TiptapBlocks\BatmanBlock;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Components\Builder;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use FilamentTiptapEditor\Enums\TiptapOutput;
use FilamentTiptapEditor\TiptapEditor;
use Illuminate\Contracts\View\View;
use JetBrains\PhpStorm\NoReturn;
use Livewire\Component;

class BuilderTestComponent extends Component implements HasForms, HasActions
{
    use InteractsWithForms;
    use InteractsWithActions;

    protected $listeners = [
        'formSubmitted' => 'submit',
    ];

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
                Builder::make('builder_test')
                    ->blocks([
                        Builder\Block::make('builder_test_block')
                            ->schema([
                                TiptapEditor::make('content')
                                    ->output(TiptapOutput::Json)
                                    ->blocks([
                                        BatmanBlock::class,
                                    ]),
                            ])
                    ])
            ])
            ->columns(1);
    }

    #[NoReturn] public function submit(): void
    {
        dd($this->form->getState());
    }

    public function render(): View
    {
        return view('livewire.repeater-test-component');
    }
}
