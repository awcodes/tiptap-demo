<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Pages\Actions;

class CreateUser extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;

    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return array_merge(
            parent::getActions(),
            [
                Actions\LocaleSwitcher::make(),
            ]
        );
    }
}
