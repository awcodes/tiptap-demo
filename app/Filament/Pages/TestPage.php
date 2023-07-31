<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class TestPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.test-page';

    protected static ?string $navigationLabel = 'Tiptap Editor';
}
