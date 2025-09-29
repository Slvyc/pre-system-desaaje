<?php

namespace App\Filament\Resources\StatistikKelompokUmurs;

use App\Filament\Resources\StatistikKelompokUmurs\Pages\ManageStatistikKelompokUmurs;
use App\Models\StatistikKelompokUmur;
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

class StatistikKelompokUmurResource extends Resource
{
    protected static ?string $model = StatistikKelompokUmur::class;

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-user-group';

    protected static string | UnitEnum | null $navigationGroup = 'Data Desa';

    protected static ?string $recordTitleAttribute = 'rentang_umur';

    public static function getPluralLabel(): string
    {
        return 'Statistik Kelompok Umur';
    }

    public static function getLabel(): string
    {
        return 'Statistik';
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('rentang_umur')
                    ->unique()
                    ->required()
                    ->maxLength(255),
                TextInput::make('jumlah')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('rentang_umur')
            ->columns([
                TextColumn::make('rentang_umur')
                    ->searchable(),
                TextColumn::make('jumlah')
                    ->label('Jumlah')
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
            'index' => ManageStatistikKelompokUmurs::route('/'),
        ];
    }
}
