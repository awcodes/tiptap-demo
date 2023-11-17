<?php

namespace App\Filament\Resources\PageResource\Pages;

use App\Filament\Resources\PageResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Pboivin\FilamentPeek\Pages\Actions\PreviewAction;

class CreatePage extends CreateRecord
{
    use HasPagePreviews;
    use CreateRecord\Concerns\Translatable;

    protected static string $resource = PageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            PreviewAction::make()->label('Preview Page'),
        ];
    }
}
