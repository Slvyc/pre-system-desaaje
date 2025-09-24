<?php

namespace App\Filament\Resources\AparatDesas;

use App\Filament\Resources\AparatDesas\Pages\ManageAparatDesas;
use App\Models\AparatDesa;
use BackedEnum;
use Faker\Core\File;
use Filament\Infolists\Components\ImageEntry;
use UnitEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ImageColumn;

class AparatDesaResource extends Resource
{
    protected static ?string $model = AparatDesa::class;

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-user-group';

    protected static string | UnitEnum | null $navigationGroup = 'Pemerintahan';

    protected static ?string $recordTitleAttribute = 'nama_aparat';

    public static function getPluralLabel(): string
    {
        return 'Aparat Pemerintah Desa';
    }

    public static function getLabel(): string
    {
        return 'Aparat';
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama_aparat')
                    ->required(),
                TextInput::make('jabatan_aparat')
                    ->required(),
                FileUpload::make('foto_aparat')
                    ->label('Foto Aparat')
                    ->directory('foto_aparat')
                    ->disk('public')
                    ->columnSpan('full')
                    ->imagePreviewHeight('250')
                    ->imageEditor(),
            ]);
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('nama_aparat'),
                TextEntry::make('jabatan_aparat'),
                ImageEntry::make('foto_aparat')
                    ->disk('public')
                    ->label('Foto Aparat')
                    ->placeholder('-'),
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
            ->recordTitleAttribute('nama_aparat')
            ->columns([
                TextColumn::make('nama_aparat')
                    ->searchable(),
                TextColumn::make('jabatan_aparat')
                    ->searchable(),
                ImageColumn::make('foto_aparat')
                    ->height(200)
                    ->disk('public')
                    ->label('Foto Aparat'),
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
            'index' => ManageAparatDesas::route('/'),
        ];
    }
}
