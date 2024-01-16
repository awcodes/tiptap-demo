<?php

namespace App\Livewire;

use App\ContentHelper;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Forms;
use FilamentTiptapEditor\Enums\TiptapOutput;
use FilamentTiptapEditor\TiptapEditor;
use FilamentTiptapEditor\TiptapFaker;
use Livewire\Component;

class Sink extends Component implements HasForms, HasActions
{
    use InteractsWithActions;
    use InteractsWithForms;

    protected $listeners = [
        'formSubmitted' => 'submit',
    ];

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill([
            'html_content' => ContentHelper::html(),
            'json_content' => TiptapFaker::make()->sink()->asJSON(true),
            'repeater_test' => [
                [
//                    'repeater_html_content' => ContentHelper::html(),
//                    'repeater_json_content' => ContentHelper::json(),
                    'repeater_html_content' => null,
                ],
                [
                    'repeater_html_content' => null,
                ]
            ]
        ]);
    }

    public function form(Form $form): Form
    {
        return $form
            ->statePath('data')
            ->schema([
                Forms\Components\Actions::make([
                    Forms\Components\Actions\Action::make('test_modal_content')
                        ->form([
                            TiptapEditor::make('modal_content')
                                ->output(TiptapOutput::Json)
                                ->default(fn () => ContentHelper::json())
                                ->columnSpanFull(),
                        ])
                        ->action(fn() => null)
                ]),
                TiptapEditor::make('html_content')
                    ->mergeTags(['email', 'name', 'phone'])
                    ->showMergeTagsInBlocksPanel(false),
                TiptapEditor::make('json_content')
                    ->output(TiptapOutput::Json),
                Repeater::make('repeater_test')
                    ->reorderableWithButtons()
                    ->schema([
                        TiptapEditor::make('repeater_html_content'),
                    ])
//                TiptapEditor::make('minimal')
//                    ->profile('minimal')
//                    ->extraInputAttributes(['style' => 'min-height: 12rem;']),
            ]);
    }

    public function submit(): void
    {
        dd($this->form->getState());
    }

    public function render()
    {
        return view('livewire.sink');
    }
}
