<?php

namespace App\Filament\Resources\Uraians;

use App\Filament\Resources\Uraians\Pages\ManageUraians;
use App\Models\Uraian;
use BackedEnum;
use Illuminate\Validation\Rules\Unique;
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

class UraianResource extends Resource
{
    protected static ?string $model = Uraian::class;

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-banknotes';

    protected static string | UnitEnum | null $navigationGroup = 'Anggaran';

    // protected static ?int $navigationSort = 2;

    protected static ?string $recordTitleAttribute = 'nama_uraian';

    public static function getPluralLabel(): string
    {
        return 'Master Uraian Anggaran';
    }

    public static function getLabel(): string
    {
        return 'Uraian';
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('kategori_id')
                    ->label('Kategori')
                    ->relationship('kategori', 'nama_kategori')
                    ->required()
                    ->searchable()
                    ->preload(),
                TextInput::make('nama_uraian')
                    ->required()
                    ->maxLength(255),
                TextInput::make('tahun')
                    ->label('Tahun Anggaran')
                    ->required()
                    ->numeric()
                    ->minValue(2000)
                    ->maxValue(date('Y') + 5),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('nama_uraian')
            ->columns([
                TextColumn::make('tahun')
                    ->sortable()
                    ->label('Tahun Anggaran')
                    ->searchable(),
                TextColumn::make('kategori.nama_kategori')
                    ->label('Nama Kategori Anggaran')
                    ->sortable(),
                TextColumn::make('nama_uraian')
                    ->label('Nama Uraian')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->label('Di Buat Pada')
                    ->dateTime()
                    ->sortable()
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
            'index' => ManageUraians::route('/'),
        ];
    }
}
