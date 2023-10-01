<?php

namespace App\Livewire;

use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use FilamentTiptapEditor\Enums\TiptapOutput;
use FilamentTiptapEditor\TiptapEditor;
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
            'default' => '<p></p><h2>Praesentium Consequuntur Qui Repudiandae Quo Deserunt Sed</h2><p>Provident <a href="https://filamentphp.com" as_button="false">architecto et recusandae</a> nulla et sint voluptate. Est vero nisi nulla libero. Dolor <a href="https://google.com">necessitatibus consequuntur</a> occaecati quae porro sed quisquam. Deleniti occaecati tenetur quisquam et odio necessitatibus. Blanditiis ut quia perspiciatis.</p><pre class="hljs"><code>export default function testComponent({
    state,
}) {
    return {
        state,

        // You can define any other Alpine.js properties here.

        init: function () {
            // Initialise the Alpine component here, if you need to.
        },

        // You can define any other Alpine.js functions here.
    }
}</code></pre><details><summary>This is another details item</summary><div data-type="details-content"><p>Provident architecto et recusandae nulla et sint voluptate. Est vero nisi nulla libero. Dolor necessitatibus consequuntur occaecati quae porro sed quisquam. Deleniti occaecati tenetur quisquam et odio necessitatibus. Blanditiis ut quia perspiciatis.</p></div></details><details><summary>This is the Summary blah</summary><div data-type="details-content"><p>Provident architecto et recusandae nulla et sint voluptate. Est vero nisi nulla libero. Dolor necessitatibus consequuntur occaecati quae porro sed quisquam. Deleniti occaecati tenetur quisquam et odio necessitatibus. Blanditiis ut quia perspiciatis.</p></div></details><div class="filament-tiptap-grid" type="responsive" cols="3"><div class="filament-tiptap-grid__column"><h2>Praesentium Consequuntur Qui Repudiandae Quo Deserunt Sed</h2><p>Provident architecto et recusandae nulla et sint voluptate. Est vero nisi nulla libero. Dolor necessitatibus consequuntur occaecati quae porro sed quisquam. Deleniti occaecati tenetur quisquam et odio necessitatibus. Blanditiis ut quia perspiciatis.</p></div><div class="filament-tiptap-grid__column"><h2>Praesentium Consequuntur Qui Repudiandae Quo Deserunt Sed</h2><p>Provident architecto et recusandae nulla et sint voluptate. Est vero nisi nulla libero. Dolor necessitatibus consequuntur occaecati quae porro sed quisquam. Deleniti occaecati tenetur quisquam et odio necessitatibus. Blanditiis ut quia perspiciatis. Deleniti occaecati tenetur quisquam et odio necessitatibus. Blanditiis ut quia perspiciatis.</p></div><div class="filament-tiptap-grid__column"><h2>Praesentium Consequuntur Qui Repudiandae Quo Deserunt Sed</h2><p>Provident architecto et recusandae nulla et sint voluptate. Est vero nisi nulla libero. Dolor necessitatibus consequuntur occaecati quae porro sed quisquam. Deleniti occaecati tenetur quisquam et odio necessitatibus. Blanditiis ut quia perspiciatis.</p></div></div><div class="filament-tiptap-grid" type="responsive" cols="4"><div class="filament-tiptap-grid__column"><h2>Praesentium Consequuntur</h2><p>Provident architecto et recusandae nulla et sint voluptate. Est vero nisi nulla libero.</p></div><div class="filament-tiptap-grid__column"><h2>Qui Repudiandae Quo Deserunt Sed</h2><p>Provident architecto et recusandae nulla et sint voluptate. Est vero nisi nulla libero.</p></div><div class="filament-tiptap-grid__column"><h2>Quo Deserunt Sed</h2><p>Dolor necessitatibus consequuntur occaecati quae porro sed quisquam. Deleniti occaecati tenetur quisquam et odio necessitatibus. Blanditiis ut quia perspiciatis.</p></div><div class="filament-tiptap-grid__column"><h2>Praesentium Consequuntur</h2><p>Provident architecto et recusandae nulla et sint voluptate. Est vero nisi nulla libero. Dolor necessitatibus consequuntur occaecati quae porro sed quisquam. Deleniti occaecati tenetur quisquam et odio necessitatibus. Blanditiis ut quia perspiciatis.</p></div></div><h3>Praesentium Consequuntur Qui Repudiandae Quo Deserunt Sed</h3><p>Provident architecto et recusandae nulla et sint voluptate. Est vero nisi nulla libero. Dolor necessitatibus consequuntur occaecati quae porro sed quisquam. Deleniti occaecati tenetur quisquam et odio necessitatibus. Blanditiis ut quia perspiciatis.</p><h2>Dolore Quasi Et A Voluptas Totam Voluptate At</h2><p>Qui est veniam quae cum est nihil. Animi odit mollitia inventore expedita aliquid cum.</p><p>Quia ut amet ipsum repudiandae. Quia et quasi quibusdam enim.</p><p>Error accusamus laboriosam reprehenderit earum mollitia quo. Beatae quibusdam et quo ut fugiat culpa. A impedit fuga ipsam quo et. Corrupti et beatae culpa et excepturi delectus voluptas.</p><p><a href="https://google.com" data-as-button="true" data-as-button-theme="primary">link-primary</a> <a href="https://google.com" as_button="true" button_theme="secondary">link-secondary</a> <a href="https://google.com" as_button="true" button_theme="tertiary">link-tertiary</a> <a href="https://google.com" as_button="true" button_theme="accent">link-accent</a></p>',
            'simple' => [
                'type' => 'doc',
                'content' => [
                    [
                        'type' => 'heading',
                        'attrs' => [
                            'textAlign' => 'left',
                            'level' => 1,
                        ],
                        'content' => [
                            [
                                'type' => 'text',
                                'text' => 'Praesentium Consequuntur Qui Repudiandae Quo Deserunt Sed',
                            ],
                        ],
                    ],
                    [
                        'type' => 'paragraph',
                        'attrs' => [
                            'textAlign' => 'left',
                            'class' => NULL,
                        ],
                        'content' => [
                            [
                                'type' => 'text',
                                'text' => 'Provident architecto et recusandae nulla et sint voluptate. Est vero nisi nulla libero. Dolor necessitatibus consequuntur occaecati quae porro sed quisquam. Deleniti occaecati tenetur quisquam et odio necessitatibus. Blanditiis ut quia perspiciatis.',
                            ],
                        ],
                    ],
                    [
                        'type' => 'heading',
                        'attrs' => [
                            'textAlign' => 'left',
                            'level' => 2,
                        ],
                        'content' => [
                            [
                                'type' => 'text',
                                'text' => 'Dolore Quasi Et A Voluptas Totam Voluptate At',
                            ],
                        ],
                    ],
                    [
                        'type' => 'paragraph',
                        'attrs' => [
                            'textAlign' => 'left',
                            'class' => NULL,
                        ],
                        'content' => [
                            [
                                'type' => 'text',
                                'text' => 'Qui est veniam quae cum est nihil. Animi odit mollitia inventore expedita aliquid cum.',
                            ],
                        ],
                    ],
                    [
                        'type' => 'paragraph',
                        'attrs' => [
                            'textAlign' => 'left',
                            'class' => NULL,
                        ],
                        'content' => [
                            [
                                'type' => 'text',
                                'text' => 'Quia ut amet ipsum repudiandae. Quia et quasi quibusdam enim.',
                            ],
                        ],
                    ],
                    [
                        'type' => 'paragraph',
                        'attrs' => [
                            'textAlign' => 'left',
                            'class' => NULL,
                        ],
                        'content' => [
                            [
                                'type' => 'text',
                                'text' => 'Error accusamus laboriosam reprehenderit earum mollitia quo. Beatae quibusdam et quo ut fugiat culpa. A impedit fuga ipsam quo et. Corrupti et beatae culpa et excepturi delectus voluptas.',
                            ],
                        ],
                    ],
                ],
            ],
        ]);
    }

    public function form(Form $form): Form
    {
        return $form
            ->statePath('data')
            ->schema([
                TiptapEditor::make('default')
                    ->floatingMenuTools(['grid']),
//                TiptapEditor::make('simple')
//                    ->output(TiptapOutput::Json)
//                    ->profile('simple'),
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
