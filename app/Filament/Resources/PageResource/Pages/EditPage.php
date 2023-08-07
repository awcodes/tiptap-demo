<?php

namespace App\Filament\Resources\PageResource\Pages;

use App\Filament\Resources\PageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Pboivin\FilamentPeek\Pages\Actions\PreviewAction;

class EditPage extends EditRecord
{
    use HasPagePreviews;

    protected static string $resource = PageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            PreviewAction::make()->label('Preview Page'),
            Actions\DeleteAction::make(),
        ];
    }
}
