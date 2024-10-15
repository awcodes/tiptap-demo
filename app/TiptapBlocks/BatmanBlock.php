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
            TextInput::make('name'),
            TextInput::make('color'),
            TiptapEditor::make('description'),
            Select::make('side')
                ->options([
                    'Hero' => 'Hero',
                    'Villain' => 'Villain',
                ])
                ->default('Hero')
        ];
    }
}
