<?php

namespace App\Filament\Resources\BaganDesas;

use App\Filament\Resources\BaganDesas\Pages\ManageBaganDesas;
use App\Models\BaganDesa;
use BackedEnum;
use UnitEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Filament\Forms\Components\FileUpload;

class BaganDesaResource extends Resource
{
    protected static ?string $model = BaganDesa::class;

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-square-2-stack';

    protected static string | UnitEnum | null $navigationGroup = 'Pemerintahan';

    protected static ?string $recordTitleAttribute = 'null';

    public static function getPluralLabel(): string
    {
        return 'Bagan Pemerintahan';
    }

    public static function getLabel(): string
    {
        return 'Bagan Pemerintahan';
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('struktur_organisasi_pemerintahan_desa')
                    ->label('Foto Struktur Organisasi Pemerintahan Desa')
                    ->directory('foto_struktur_organisasi')
                    ->disk('public')
                    ->columnSpan('full')
                    ->imagePreviewHeight('250')
                    ->imageEditor(),
                FileUpload::make('struktur_organisasi_badan_permusyawaratan_desa')
                    ->label('Foto Struktur Organisasi Badan Permusyawaratan Desa')
                    ->directory('foto_struktur_organisasi')
                    ->disk('public')
                    ->columnSpan('full')
                    ->imagePreviewHeight('250')
                    ->imageEditor(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([]);
    }

    public static function canCreate(): bool
    {
        return BaganDesa::count() === 0;
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageBaganDesas::route('/'),
        ];
    }
}
