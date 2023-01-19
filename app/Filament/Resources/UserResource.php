<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages\CreateUser;
use App\Filament\Resources\UserResource\Pages\EditUser;
use App\Filament\Resources\UserResource\Pages\ListUsers;
use App\Filament\Resources\UserResource\RelationManagers\PostsRelationManager;
use App\Models\User;
use Awcodes\Scribe\Components\ScribeBlock;
use Awcodes\Scribe\Fields\Scribe;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Awcodes\Curator\Components\Tables\CuratorColumn;
use FilamentTiptapEditor\Components\TiptapBlock;
use FilamentTiptapEditor\TiptapEditor;
use Illuminate\Support\Facades\Hash;
use Awcodes\Constructor\Forms\Components\Constructor;

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
                        Constructor::make('notes'),
                        TiptapEditor::make('bio')
                            ->output(TiptapEditor::OUTPUT_JSON)
                            ->profile('simple')
                            ->columnSpan('full'),
//                        Scribe::make('notes')
//                            ->blocks([
//                                ScribeBlock::make('infographic')
//                                    ->schema([
//                                        Forms\Components\TextInput::make('title')->required(),
//                                        Forms\Components\FileUpload::make('image'),
//                                        Forms\Components\Textarea::make('notes'),
//                                    ]),
//                                ScribeBlock::make('grid')
//                                    ->schema([
//                                        Forms\Components\TextInput::make('grid_title'),
//                                        Forms\Components\Textarea::make('grid_notes'),
//                                    ])
//                            ])
//                            ->columnSpan('full'),
                        CuratorPicker::make('avatar_id')
                            ->label('Avatar')
                            ->columnSpan('full'),
                        Forms\Components\Repeater::make('images')
                            ->schema([
                                CuratorPicker::make('image')
                                    ->directory('repeater-test')
                                    ->maxSize(1024)
                                    ->imageCropAspectRatio('16:9')
                                    ->imageResizeTargetWidth('640')
                                    ->imageResizeTargetHeight('360')

                            ])
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
