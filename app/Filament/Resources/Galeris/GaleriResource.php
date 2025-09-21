<?php

namespace App\Filament\Resources\Galeris;

use App\Filament\Resources\Galeris\Pages\ManageGaleris;
use App\Models\Galeri;
use BackedEnum;
use UnitEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Support\Facades\Storage;

class GaleriResource extends Resource
{
    protected static ?string $model = Galeri::class;

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-photo';
    protected static string | UnitEnum | null $navigationGroup = 'Konten';
    protected static ?string $recordTitleAttribute = 'nama_gambar';
    protected static ?string $navigationLabel = 'Galeri';
    protected static ?string $label = 'Galeri'; // Mengubah nama header
    protected static ?string $slug = 'galeri';

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
                TextInput::make('nama_gambar')
                    ->required(),
                FileUpload::make('file_path')
                    ->label('Gambar')
                    ->required()
                    ->directory('galeri')
                    ->disk('public')
                    ->image(),
            ]);
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('nama_gambar'),
                ImageEntry::make('file_path')
                    ->disk('public')
                    ->label('Gambar'),
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
            ->recordTitleAttribute('nama_gambar')
            ->columns([
                TextColumn::make('nama_gambar')
                    ->searchable(),
                ImageColumn::make('file_path')
                    ->disk('public')
                    ->label('Gambar'),
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
            'index' => ManageGaleris::route('/'),
        ];
    }
}
