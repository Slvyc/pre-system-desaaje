<?php

namespace App\Filament\Resources\AnggaranTerealisasis;

use App\Filament\Resources\AnggaranTerealisasis\Pages\ManageAnggaranTerealisasis;
use App\Models\AnggaranTerealisasi;
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
use Illuminate\Database\Eloquent\Relations\Relation;

use function Laravel\Prompts\select;

class AnggaranTerealisasiResource extends Resource
{
    protected static ?string $model = AnggaranTerealisasi::class;

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-currency-dollar';

    protected static string | UnitEnum | null $navigationGroup = 'Anggaran';

    public static function getPluralLabel(): string
    {
        return 'Nilai Anggaran';
    }

    public static function getLabel(): string
    {
        return 'Nilai Anggaran';
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('uraian_id')
                    ->relationship('uraian', 'nama_uraian')
                    ->label('Nama Uraian')
                    ->required()
                    ->searchable()
                    ->preload(),
                TextInput::make('anggaran')
                    ->label('Nilai Anggaran')
                    ->prefix('Rp')
                    ->numeric()
                    ->nullable(),
                TextInput::make('realisasi')
                    ->label('Nilai Realisasi')
                    ->prefix('Rp')
                    ->numeric()
                    ->nullable(),
                TextInput::make('tahun')
                    ->label('Tahun')
                    ->required()
                    ->numeric()
                    ->minValue(2000)
                    ->maxValue(date('Y') + 5),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('tahun')
                    ->sortable()
                    ->label('Tahun Anggaran')
                    ->searchable(),

                TextColumn::make('uraian.kategori_id')
                    ->sortable()
                    ->label('Kategori ID')
                    ->searchable(),

                TextColumn::make('uraian.nama_uraian')
                    ->label('Nama Uraian')
                    ->searchable(),

                TextColumn::make('anggaran')
                    ->formatStateUsing(fn($state) => 'Rp. ' . number_format($state, 2, ',', '.'))
                    ->label('Nilai Anggaran')
                    ->searchable(),

                TextColumn::make('realisasi')
                    ->formatStateUsing(fn($state) => 'Rp. ' . number_format($state, 2, ',', '.'))
                    ->label('Nilai Realisasi')
                    ->searchable(),

                TextColumn::make('lebih_kurang')
                    ->formatStateUsing(fn($state) => 'Rp. ' . number_format($state, 2, ',', '.'))
                    ->label('Nilai Lebih Kurang')
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
            'index' => ManageAnggaranTerealisasis::route('/'),
        ];
    }
}
