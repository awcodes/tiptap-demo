<?php

namespace App\TiptapBlocks;

use Filament\Forms\Components\TextInput;
use FilamentTiptapEditor\Livewire\TiptapBlock;

class BatmanBlock extends TiptapBlock
{
    public string $preview = 'blocks.previews.batman';

    public ?string $label = 'Batman Block';

    public function getFormSchema(): array
    {
        return [
            TextInput::make('name'),
            TextInput::make('color'),
        ];
    }
}
