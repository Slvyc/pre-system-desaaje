<?php

namespace App\Filament\Resources\Produks;

use App\Filament\Resources\Produks\Pages\ManageProduks;
use App\Models\Produk;
use BackedEnum;
use UnitEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TextInput\Mask;
use Filament\Forms\Components\Textarea;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;


class ProdukResource extends Resource
{
    protected static ?string $model = Produk::class;

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-building-storefront';
    protected static string | UnitEnum | null $navigationGroup = 'Produk Desa';
    protected static ?string $recordTitleAttribute = 'nama_produk';
    protected static ?string $navigationLabel = 'Produk';
    protected static ?string $label = 'Produk'; // Mengubah nama header
    protected static ?string $slug = 'produk';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getPluralLabel(): string
    {
        return 'Galeri Foto';
    }

    public static function getLabel(): string
    {
        return 'Galeri';
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama_produk')
                    ->required(),
                Textarea::make('deskripsi')
                    ->columnSpanFull(),
                TextInput::make('harga')
                    ->label('Harga (IDR)')
                    ->prefix('Rp')
                    ->numeric()
                    ->required(),
                TextInput::make('stok')
                    ->required()
                    ->numeric()
                    ->default(0),
                FileUpload::make('gambar_produk')
                    ->label('Gambar Produk')
                    ->required()
                    ->directory('produk')
                    ->disk('public')
                    ->image()
                    ->columnSpan('full')
                    ->imagePreviewHeight('250')
                    ->imageEditor(),
                TextInput::make('no_hp_penjual')
                    ->label('Nomor HP Penjual (Wajib Diawali 62)')
                    ->required(),
                Select::make('satuan')
                    ->label('Satuan Produk')
                    ->options([
                        'Kg' => 'Kg',
                        'Pcs' => 'Pcs',
                        'Liter' => 'Liter',
                        'Box' => 'Box',
                        'Unit' => 'Unit',
                    ])
                    ->required()
            ]);
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('nama_produk'),
                TextEntry::make('deskripsi')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('harga')
                    ->numeric(),
                TextEntry::make('stok')
                    ->numeric(),
                ImageEntry::make('gambar_produk')
                    ->placeholder('-')
                    ->label('Gambar Produk')
                    ->disk('public')
                    ->columnSpan('full'),
                TextEntry::make('no_hp_penjual')
                    ->label('Nomor HP Penjual'),
                TextEntry::make('satuan')
                    ->label('Satuan Produk'),
                TextEntry::make('created_at')
                    ->label('Ditambahkan Pada :')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->label('Terakhir Diperbaharui Pada :')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('nama_produk')
            ->columns([
                TextColumn::make('nama_produk')
                    ->searchable(),
                TextColumn::make('deskripsi')
                    ->wrap()
                    ->limit(50)
                    ->label('Deskripsi')
                    ->searchable(),
                TextColumn::make('harga')
                    ->label('Harga (IDR)')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('stok')
                    ->numeric()
                    ->sortable(),
                ImageColumn::make('gambar_produk')
                    ->height(200)
                    ->disk('public')
                    ->label('Gambar Produk'),
                TextColumn::make('no_hp_penjual')
                    ->label('Nomor HP Penjual'),
                TextColumn::make('satuan')
                    ->label('Satuan Produk')
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
                ViewAction::make(),
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
            'index' => ManageProduks::route('/'),
        ];
    }
}
