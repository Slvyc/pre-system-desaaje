<?php

namespace App\Filament\Resources\StatistikDusuns;

use App\Filament\Resources\StatistikDusuns\Pages\ManageStatistikDusuns;
use App\Models\StatistikDusun;
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
use Filament\Tables\Table;

class StatistikDusunResource extends Resource
{
    protected static ?string $model = StatistikDusun::class;

    protected static string | UnitEnum | null $navigationGroup = 'Data Desa';

    protected static ?string $recordTitleAttribute = 'nama_dusun';

    public static function getPluralLabel(): string
    {
        return 'Statistik Dusun';
    }

    public static function getLabel(): string
    {
        return 'Statistik';
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama_dusun')
                    ->label('Nama Dusun')
                    ->unique()
                    ->required()
                    ->maxLength(255),
                TextInput::make('jumlah_penduduk')
                    ->label('Jumlah Penduduk')
                    ->required()
                    ->numeric()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('nama_dusun')
            ->columns([
                TextColumn::make('nama_dusun')
                    ->label('Nama Dusun')
                    ->searchable(),
                TextColumn::make('jumlah_penduduk')
                    ->label('Jumlah Penduduk')
                    ->searchable(),
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
            'index' => ManageStatistikDusuns::route('/'),
        ];
    }
}
