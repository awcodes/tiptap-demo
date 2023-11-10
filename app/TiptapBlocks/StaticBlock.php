<?php

namespace App\TiptapBlocks;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use FilamentTiptapEditor\TiptapBlock;

class StaticBlock extends TiptapBlock
{
    public string $preview = 'blocks.previews.view-only';

    public string $rendered = 'blocks.rendered.view-only';
}
