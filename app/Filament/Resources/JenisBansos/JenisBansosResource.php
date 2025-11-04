<?php

namespace App\Filament\Resources\JenisBansos;

use App\Filament\Resources\JenisBansos\Pages\ManageJenisBansos;
use App\Models\JenisBansos;
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

class JenisBansosResource extends Resource
{
    protected static ?string $model = JenisBansos::class;

    protected static string | UnitEnum | null $navigationGroup = 'Data Bansos Desa';

    protected static ?string $recordTitleAttribute = 'nama_bantuan';

    public static function getPluralLabel(): string
    {
        return 'Master Jenis Bansos';
    }

    public static function getLabel(): string
    {
        return 'Jenis';
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama_bantuan')
                    ->required(),
                TextInput::make('deskripsi')
                    ->required(),
                TextInput::make('sumber_dana')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('nama_bantuan')
            ->columns([
                TextColumn::make('nama_bantuan')
                    ->searchable(),
                TextColumn::make('deskripsi')
                    ->searchable(),
                TextColumn::make('sumber_dana')
                    ->searchable(),
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
            'index' => ManageJenisBansos::route('/'),
        ];
    }
}
