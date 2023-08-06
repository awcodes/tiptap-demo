<?php

namespace App\Filament\Resources\PageResource\Pages;

use Pboivin\FilamentPeek\Pages\Concerns\HasPreviewModal;

trait HasPagePreviews
{
    use HasPreviewModal;

    protected function getPreviewModalView(): ?string
    {
        return 'page.preview';
    }

    protected function getPreviewModalDataRecordKey(): ?string
    {
        return 'page';
    }
}
