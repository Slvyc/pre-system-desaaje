<?php

namespace App\Filament\Resources\DataStuntings;

use App\Filament\Resources\DataStuntings\Pages\ManageDataStuntings;
use App\Models\DataStunting;
use BackedEnum;
use UnitEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Select;
use Filament\Tables\Table;

class DataStuntingResource extends Resource
{
    protected static ?string $model = DataStunting::class;

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-user-group';

    protected static string | UnitEnum | null $navigationGroup = 'Data Stunting Desa';

    protected static ?string $recordTitleAttribute = 'kategori_stunting_id';

    public static function getPluralLabel(): string
    {
        return 'Statistik Stunting';
    }

    public static function getLabel(): string
    {
        return 'Statistik';
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('kategori_stunting_id')
                    ->relationship('kategoriStunting', 'nama_kategori')
                    ->label('Kategori Stunting')
                    ->required()
                    ->searchable()
                    ->preload(),
                TextInput::make('tahun')
                    ->required(),
                TextInput::make('jumlah')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('kategori_stunting_id')
            ->columns([
                TextColumn::make('kategoriStunting.nama_kategori')
                    ->label('Kategori Stunting')
                    ->sortable(),
                TextColumn::make('tahun')
                    ->sortable(),
                TextColumn::make('jumlah')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageDataStuntings::route('/'),
        ];
    }
}
