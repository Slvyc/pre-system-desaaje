<?php

namespace App\Filament\Resources\RincianAnggarans;

use App\Filament\Resources\RincianAnggarans\Pages\ManageRincianAnggarans;
use App\Models\RincianAnggaran;
use BackedEnum;
use UnitEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class RincianAnggaranResource extends Resource
{
    protected static ?string $model = RincianAnggaran::class;

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-currency-dollar';

    protected static string | UnitEnum | null $navigationGroup = 'Anggaran';

    protected static ?int $navigationSort = 1;

    public static function getPluralLabel(): string
    {
        return 'Rincian Nilai Anggaran';
    }

    public static function getLabel(): string
    {
        return 'Rincian Nilai Anggaran';
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('anggaran_terealisasi_id')
                    ->relationship('anggaran', 'uraian_id')
                    ->label('Nama Uraian')
                    ->required()
                    ->searchable()
                    ->preload(),
                TextInput::make('nama_rincian')
                    ->required()
                    ->label('Nama Rincian Anggaran'),
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
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('anggaran.uraian.tahun')
                    ->sortable()
                    ->label('Tahun Anggaran')
                    ->searchable(),

                TextColumn::make('anggaran.uraian_id')
                    ->sortable()
                    ->label('Kategori ID')
                    ->searchable(),

                TextColumn::make('nama_rincian')
                    ->label('Nama Rincian Anggaran')
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
            'index' => ManageRincianAnggarans::route('/'),
        ];
    }
}
