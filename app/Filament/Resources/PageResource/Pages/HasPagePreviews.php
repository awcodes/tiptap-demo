<?php

namespace App\Filament\Resources\PageResource\Pages;

use App\Filament\Resources\PageResource;
use Pboivin\FilamentPeek\Pages\Concerns\HasPreviewModal;
use Pboivin\FilamentPeek\Pages\Concerns\HasBuilderPreview;
use Filament\Forms\Components\Component;

trait HasPagePreviews
{
    use HasPreviewModal;
    use HasBuilderPreview;

    protected function getPreviewModalView(): ?string
    {
        return 'page.preview';
    }

    protected function getPreviewModalDataRecordKey(): ?string
    {
        return 'page';
    }

    protected function getBuilderPreviewView(string $builderName): ?string
    {
        return 'page.preview-content';
    }

    public static function getBuilderEditorSchema(string $builderName): Component|array
    {
        return PageResource::contentField();
    }
}
