<?php

namespace App\Filament\Resources\PotensiDesas;

use App\Filament\Resources\PotensiDesas\Pages\ManagePotensiDesas;
use App\Models\PotensiDesa;
use BackedEnum;
use UnitEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Forms\Components\RichEditor;
use Filament\Infolists\Components\ImageEntry;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;

class PotensiDesaResource extends Resource
{
    protected static ?string $model = PotensiDesa::class;

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-presentation-chart-line';

    protected static string | UnitEnum | null $navigationGroup = 'Konten';

    protected static ?string $recordTitleAttribute = 'nama_potensi';

    public static function getPluralLabel(): string
    {
        return 'Potensi Desa Aje';
    }

    public static function getLabel(): string
    {
        return 'Potensi';
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama_potensi')
                    ->label('Judul Berita')
                    ->required(),
                TextInput::make('slug')
                    ->label('Slug (contoh: nama-potensi)')
                    ->required(),
                FileUpload::make('gambar_potensi')
                    ->label('Gambar')
                    ->directory('potensi')
                    ->disk('public')
                    ->columnSpan('full')
                    ->imagePreviewHeight('250')
                    ->imageEditor()
                    ->required(),
                TextArea::make('bagian_potensi')
                    ->label('Bagian')
                    ->columnSpanFull()
                    ->autosize()
                    ->required()
                    ->columnSpanFull(),
                DatePicker::make('tanggal_potensi')
                    ->label('Tanggal')
                    ->columnSpanFull()
                    ->required(),
            ]);
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('nama_potensi'),
                TextEntry::make('slug'),
                ImageEntry::make('gambar_potensi')
                    ->columnSpanFull()
                    ->disk('public')
                    ->label('Gambar'),
                TextEntry::make('bagian_potensi')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('tanggal_potensi')
                    ->label('Tanggal')
                    ->date(),
                TextEntry::make('views')
                    ->numeric(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('nama_potensi')
            ->columns([
                TextColumn::make('nama_potensi')
                    ->searchable(),
                TextColumn::make('slug')
                    ->searchable(),
                ImageColumn::make('gambar_potensi')
                    ->height(200)
                    ->disk('public')
                    ->label('Gambar'),
                TextColumn::make('bagian_potensi')
                    ->wrap()
                    ->limit(50)
                    ->label('Bagian')
                    ->searchable(),
                TextColumn::make('tanggal_potensi')
                    ->date()
                    ->sortable(),
                TextColumn::make('views')
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
            'index' => ManagePotensiDesas::route('/'),
        ];
    }
}
