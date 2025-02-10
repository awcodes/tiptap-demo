<?php

namespace App\Livewire;

use App\TiptapBlocks\BatmanBlock;
use App\TiptapBlocks\StaticBlock;
use App\TiptapBlocks\VideoBlock;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use FilamentTiptapEditor\Enums\TiptapOutput;
use FilamentTiptapEditor\TiptapEditor;
use Illuminate\Contracts\View\View;
use JetBrains\PhpStorm\NoReturn;
use Livewire\Component;

class RepeaterTestComponent extends Component implements HasForms, HasActions
{
    use InteractsWithForms;
    use InteractsWithActions;

    protected $listeners = [
        'formSubmitted' => 'submit',
    ];

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill([
            'repeater_test' => [
                [
                    'content' => null,
                ],
                [
                    'content' => null,
                ]
            ]
        ]);
    }

    public function form(Form $form): Form
    {
        return $form
            ->statePath('data')
            ->schema([
                Repeater::make('repeater_test')
                    ->reorderableWithButtons()
                    ->schema([
                        TiptapEditor::make('content')
                            ->label(fn ($component) => $component->getStatePath())
                            ->output(TiptapOutput::Json),
//                        RichEditor::make('rich_editor'),
//                        MarkdownEditor::make('markdown_editor'),
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
