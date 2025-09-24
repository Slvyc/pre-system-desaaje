<?php

namespace App\Filament\Resources\Sejarahs;

use App\Filament\Resources\Sejarahs\Pages\ManageSejarahs;
use App\Models\Sejarah;
use BackedEnum;
use UnitEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SejarahResource extends Resource
{
    protected static ?string $model = Sejarah::class;

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-backward';

    protected static string | UnitEnum | null $navigationGroup = 'Profil Desa';

    protected static ?string $recordTitleAttribute = null;

    public static function getRecordTitle(?\Illuminate\Database\Eloquent\Model $record = null): string
    {
        return 'Sejarah Desa Aje';
    }

    public static function getPluralLabel(): string
    {
        return 'Sejarah ';
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('judul_sejarah')
                    ->label('Judul'),

                RichEditor::make('bagian_sejarah')
                    ->label('Bagian Sejarah')
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
        return Sejarah::count() === 0;
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageSejarahs::route('/'),
        ];
    }
}
