<?php

namespace App\TiptapBlocks;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use FilamentTiptapEditor\TiptapBlock;

class BatmanBlock extends TiptapBlock
{
    public string $preview = 'blocks.previews.batman';

    public string $rendered = 'blocks.rendered.batman';

    public bool $slideOver = true;

    public function getFormSchema(): array
    {
        return [
            TextInput::make('name'),
            TextInput::make('color'),
            Select::make('side')
                ->options([
                    'Hero' => 'Hero',
                    'Villain' => 'Villain',
                ])
                ->default('Hero')
        ];
    }
}
