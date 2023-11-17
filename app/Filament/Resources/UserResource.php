<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages\CreateUser;
use App\Filament\Resources\UserResource\Pages\EditUser;
use App\Filament\Resources\UserResource\Pages\ListUsers;
use App\Filament\Resources\UserResource\RelationManagers\PostsRelationManager;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables;
use FilamentTiptapEditor\TiptapEditor;
use Illuminate\Support\Facades\Hash;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-circle';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Details')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->reactive(),
                        Forms\Components\TextInput::make('email')
                            ->required()
                            ->email()
                            ->unique(User::class, 'email', ignoreRecord: true),
                        Forms\Components\TextInput::make('password')
                            ->columnSpan('full')
                            ->visibleOn('create')
                            ->required()
                            ->dehydrateStateUsing(fn ($state): string => Hash::make($state)),
                        TiptapEditor::make('bio')
                            ->profile('simple')
                            ->columnSpan('full'),
                        TiptapEditor::make('notes')
                            ->profile('minimal')
                            ->columnSpan('full'),
                        Forms\Components\KeyValue::make('social')
                            ->columnSpan('full')
                    ])->columns(['md' => 2]),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('email'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ])
            ->defaultSort('name', 'asc');
    }

    public static function getRelations(): array
    {
        return [
            PostsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListUsers::route('/'),
            'create' => CreateUser::route('/create'),
            'edit' => EditUser::route('/{record}/edit'),
        ];
    }
}
