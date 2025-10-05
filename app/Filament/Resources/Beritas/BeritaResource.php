<?php

namespace App\Filament\Resources\Beritas;

use App\Filament\Resources\Beritas\Pages\ManageBeritas;
use App\Models\Berita;
use BackedEnum;
use UnitEnum;
use Dom\Text;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
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

class BeritaResource extends Resource
{
    protected static ?string $model = Berita::class;

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-newspaper';

    protected static string | UnitEnum | null $navigationGroup = 'Konten';

    protected static ?string $recordTitleAttribute = 'judul_berita';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getPluralLabel(): string
    {
        return 'Berita Desa Aje';
    }

    public static function getLabel(): string
    {
        return 'Berita';
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('judul_berita')
                    ->label('Judul Berita')
                    ->required(),
                TextInput::make('slug_berita')
                    ->label('Slug (contoh: judul-berita)')
                    ->required(),
                FileUpload::make('gambar_berita')
                    ->label('Gambar')
                    ->directory('berita')
                    ->disk('public')
                    ->columnSpan('full')
                    ->imagePreviewHeight('250')
                    ->imageEditor()
                    ->required(),
                TextArea::make('bagian_berita')
                    ->columnSpanFull()
                    ->autosize()
                    ->label('Bagian')
                    ->required()
                    ->columnSpanFull(),
                FileUpload::make('gambar_berita_2')
                    ->label('Gambar 2')
                    ->directory('berita')
                    ->disk('public')
                    ->columnSpan('full')
                    ->imagePreviewHeight('250')
                    ->imageEditor(),
                TextArea::make('bagian_berita_2')
                    ->columnSpanFull()
                    ->autosize()
                    ->nullable()
                    ->label('Bagian 2')
                    ->columnSpanFull(),
                DatePicker::make('tanggal_berita')
                    ->label('Tanggal')
                    ->columnSpanFull()
                    ->required(),
            ]);
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('judul_berita')
                    ->label('Judul'),
                TextEntry::make('slug_berita')
                    ->label('Slug'),
                ImageEntry::make('gambar_berita')
                    ->disk('public')
                    ->label('Gambar'),
                TextEntry::make('bagian_berita')
                    ->label('Bagian')
                    ->columnSpanFull(),
                ImageEntry::make('gambar_berita_2')
                    ->disk('public')
                    ->label('Gambar 2')
                    ->placeholder('-'),
                TextEntry::make('bagian_berita_2')
                    ->label('Bagian 2')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('tanggal_berita')
                    ->label('Tanggal')
                    ->date(),
                TextEntry::make('views')
                    ->numeric(),
                TextEntry::make('created_at')
                    ->label('Diupload Tanggal')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->label('Terakhir Diperbarui')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('judul_berita')
            ->columns([
                TextColumn::make('judul_berita')
                    ->label('Judul')
                    ->searchable(),
                TextColumn::make('slug_berita')
                    ->label('Slug')
                    ->searchable(),
                ImageColumn::make('gambar_berita')
                    ->height(200)
                    ->disk('public')
                    ->label('Gambar'),
                TextColumn::make('bagian_berita')
                    ->wrap()
                    ->limit(50)
                    ->label('Bagian')
                    ->searchable(),
                ImageColumn::make('gambar_berita_2')
                    ->height(200)
                    ->disk('public')
                    ->label('Gambar 2')
                    ->searchable(),
                TextColumn::make('bagian_berita_2')
                    ->wrap()
                    ->limit(50)
                    ->label('Bagian 2')
                    ->searchable(),
                TextColumn::make('tanggal_berita')
                    ->label('Tanggal')
                    ->date()
                    ->sortable(),
                TextColumn::make('views')
                    ->numeric()
                    ->sortable(),
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
            'index' => ManageBeritas::route('/'),
        ];
    }
}
