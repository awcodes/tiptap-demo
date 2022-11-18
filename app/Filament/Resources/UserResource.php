<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages\CreateUser;
use App\Filament\Resources\UserResource\Pages\EditUser;
use App\Filament\Resources\UserResource\Pages\ListUsers;
use App\Filament\Resources\UserResource\RelationManagers\PostsRelationManager;
use App\Models\User;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use FilamentCurator\Forms\Components\MediaPicker;
use FilamentCurator\Tables\Columns\CuratorColumn;
use FilamentTiptapEditor\TiptapEditor;
use Illuminate\Support\Facades\Hash;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $label = 'User';

    protected static ?string $navigationGroup = 'Filament Shield';

    protected static ?string $navigationIcon = 'heroicon-o-user-circle';

    protected static ?string $recordTitleAttribute = 'name';

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
                            ->unique(User::class, 'email', fn ($record) => $record),
                        Forms\Components\TextInput::make('password')
                            ->columnSpan('full')
                            ->visible(fn ($context) => $context === 'create')
                            ->required()
                            ->dehydrateStateUsing(function ($state) {
                                return Hash::make($state);
                            }),
                        TiptapEditor::make('bio')
                            ->columnSpan('full'),
                        MediaPicker::make('avatar_id')
                            ->label('Avatar')
                            ->columnSpan('full'),
                    ])->columns(['md' => 2]),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                CuratorColumn::make('avatar')->rounded()->size(32),
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
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
