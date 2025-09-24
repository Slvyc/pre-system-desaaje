<?php

namespace App\Filament\Resources\VisiMisis;

use App\Filament\Resources\VisiMisis\Pages\ManageVisiMisis;
use App\Models\VisiMisi;
use BackedEnum;
use UnitEnum;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Table;

class VisiMisiResource extends Resource
{
    protected static ?string $model = VisiMisi::class;

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-pencil-square';

    protected static string | UnitEnum | null $navigationGroup = 'Profil Desa';

    protected static ?string $recordTitleAttribute = null;

    public static function getRecordTitle(?\Illuminate\Database\Eloquent\Model $record = null): string
    {
        return 'Visi & Misi Desa Aje';
    }

    public static function getPluralLabel(): string
    {
        return 'Visi dan Misi Desa Aje';
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                RichEditor::make('visi')
                    ->label('Visi')
                    ->toolbarButtons([
                        'bold',
                        'italic',
                        'underline',
                        'strike',
                        'bulletList',
                        'orderedList',
                        'link',
                        'blockquote',
                        'codeBlock',
                    ])
                    ->columnSpanFull(),

                RichEditor::make('misi')
                    ->label('Misi')
                    ->toolbarButtons([
                        'bold',
                        'italic',
                        'underline',
                        'strike',
                        'bulletList',
                        'orderedList',
                        'link',
                        'blockquote',
                    ])
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([]);
    }

    public static function canCreate(): bool
    {
        return VisiMisi::count() === 0;
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageVisiMisis::route('/'),
        ];
    }
}
