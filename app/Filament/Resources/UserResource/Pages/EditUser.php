<?php

namespace App\Filament\Resources\UserResource\Pages;

use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\UserResource;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;
}
