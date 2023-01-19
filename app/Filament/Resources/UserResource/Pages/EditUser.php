<?php

namespace App\Filament\Resources\UserResource\Pages;

use Filament\Pages\Actions\Action;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\UserResource;
use FilamentTiptapEditor\TiptapEditor;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function getActions(): array
    {
        return array_merge(
            parent::getActions(),
            [
//                Action::make('tiptapmodaltest')
//                    ->label('Tiptap Modal Test')
//                    ->modalHeading('Tiptap Modal Test')
//                    ->form([
//                        TiptapEditor::make('modal_test')
//                    ])
//                    ->action(fn () => dd('test'))
            ]
        );
    }

    protected function beforeSave(): void
    {
//        dd($this->form->getState());
    }
}
