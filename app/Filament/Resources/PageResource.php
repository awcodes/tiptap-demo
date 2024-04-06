<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageResource\Pages;
use App\Models\Page;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use FilamentTiptapEditor\Enums\TiptapOutput;
use FilamentTiptapEditor\TiptapEditor;
use Pboivin\FilamentPeek\Forms\Actions\InlinePreviewAction;
use Pboivin\FilamentPeek\Pages\Concerns\HasPreviewModal;

class PageResource extends Resource
{
    use HasPreviewModal;
    use Translatable;

    protected static ?string $model = Page::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getTranslatableLocales(): array
    {
        return ['en', 'es', 'fr'];
    }

    public static function contentField()
    {
        return TiptapEditor::make('content')
            ->output(TiptapOutput::Json)
            ->columnSpanFull();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Actions::make([
                    Forms\Components\Actions\Action::make('test_update_content')
                        ->action(fn(Forms\Set $set) => $set('content', tiptap_converter()->asJSON('<p>updated content from $set</p>', decoded: true)))
                ]),
                Forms\Components\TextInput::make('title')
                    ->required(),
                Forms\Components\Actions::make([
                    InlinePreviewAction::make()
                        ->label('Preview Content')
                        ->builderPreview('content'),
                ]),
                self::contentField(),
                Forms\Components\Repeater::make('repeater_content')
                    ->reorderableWithButtons()
                    ->schema([
                        TiptapEditor::make('content')
                            ->output(TiptapOutput::Json)
                            ->columnSpanFull(),
                    ]),
                Forms\Components\Builder::make('builder_content')
                    ->blocks([
                        Forms\Components\Builder\Block::make('body')
                            ->schema([
                                TiptapEditor::make('content')
                                    ->output(TiptapOutput::Json)
                                    ->columnSpanFull()
                            ]),
                    ])
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPages::route('/'),
            'create' => Pages\CreatePage::route('/create'),
            'view' => Pages\ViewPage::route('/{record}'),
            'edit' => Pages\EditPage::route('/{record}/edit'),
        ];
    }
}
