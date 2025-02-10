<?php

namespace App\TiptapBlocks;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use FilamentTiptapEditor\TiptapBlock;
use FilamentTiptapEditor\TiptapEditor;

class BatmanBlock extends TiptapBlock
{
    public string $preview = 'blocks.previews.batman';

    public string $rendered = 'blocks.rendered.batman';

    public function getFormSchema(): array
    {
        return [
            Select::make('name')
                ->options([
                    'batman' => 'Batman',
                    'robin' => 'Robin',
                    'joker' => 'Joker',
                    'poison-ivy' => 'Poison Ivy',
                ]),
            Select::make('color')
                ->options([
                    'black' => 'Black',
                    'yellow' => 'Yellow',
                    'purple' => 'Purple',
                    'green' => 'Green',
                ]),
            Select::make('side')
                ->options([
                    'Hero' => 'Hero',
                    'Villain' => 'Villain',
                ])
                ->default('Hero')
        ];
    }
}
