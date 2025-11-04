<?php

namespace App\Filament\Resources\PenerimaBansos;

use App\Filament\Resources\PenerimaBansos\Pages\ManagePenerimaBansos;
use App\Models\PenerimaBansos;
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

class PenerimaBansosResource extends Resource
{
    protected static ?string $model = PenerimaBansos::class;

    protected static string | UnitEnum | null $navigationGroup = 'Data Bansos Desa';

    protected static ?string $recordTitleAttribute = 'penduduk_bansos_id';

    public static function getPluralLabel(): string
    {
        return 'Penerima Bansos';
    }

    public static function getLabel(): string
    {
        return 'Penerima Bansos';
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('penduduk_bansos_id')
                    ->relationship('pendudukBansos', 'nama')
                    ->label('Nama Penerima Bansos')
                    ->required()
                    ->searchable()
                    ->preload(),
                Select::make('jenis_bansos_id')
                    ->relationship('jenisBansos', 'nama_bantuan')
                    ->label('Nama Jenis Bansos')
                    ->required()
                    ->searchable()
                    ->preload(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('penduduk_bansos_id')
            ->columns([
                TextColumn::make('pendudukBansos.nik')
                    ->label('NIK Penerima Bansos')
                    ->sortable(),
                TextColumn::make('pendudukBansos.nama')
                    ->label('Nama Penerima Bansos')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('jenisBansos.nama_bantuan')
                    ->label('Nama Jenis Bansos')
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
            'index' => ManagePenerimaBansos::route('/'),
        ];
    }
}
