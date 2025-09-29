<?php

namespace App\Filament\Resources\StatistikDesas;

use App\Filament\Resources\StatistikDesas\Pages\ManageStatistikDesas;
use App\Models\StatistikDesa;
use BackedEnum;
use UnitEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class StatistikDesaResource extends Resource
{
    protected static ?string $model = StatistikDesa::class;

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-user-group';

    protected static string | UnitEnum | null $navigationGroup = 'Data Desa';

    protected static ?string $recordTitleAttribute = 'grup';

    public static function getPluralLabel(): string
    {
        return 'Statistik Desa';
    }

    public static function getLabel(): string
    {
        return 'Statistik';
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('grup')
                    ->options([
                        'Umum' => 'Umum',
                        'Perkawinan' => 'Perkawinan',
                        'Agama' => 'Agama',
                        'Pendidikan' => 'Pendidikan',
                        'Pekerjaan' => 'Pekerjaan',
                    ])
                    ->required(),
                TextInput::make('kode_statistik')
                    ->unique()
                    ->required()
                    ->maxLength(255),
                TextInput::make('nama_statistik')
                    ->required()
                    ->maxLength(255),
                TextInput::make('nilai')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('grup')
            ->columns([
                TextColumn::make('grup')
                    ->searchable(),
                TextColumn::make('kode_statistik')
                    ->searchable(),
                TextColumn::make('nama_statistik')
                    ->searchable(),
                TextColumn::make('nilai')
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
            'index' => ManageStatistikDesas::route('/'),
        ];
    }
}
