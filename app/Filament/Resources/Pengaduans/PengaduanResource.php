<?php

namespace App\Filament\Resources\Pengaduans;

use App\Filament\Resources\Pengaduans\Pages\ManagePengaduans;
use App\Models\Pengaduan;
use BackedEnum;
use Dom\Text;
use UnitEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\SelectColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Schemas\Components\View;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

use Filament\Tables\Columns\BadgeColumn;

class PengaduanResource extends Resource
{
    protected static ?string $model = Pengaduan::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-chat-bubble-bottom-center-text';

    protected static string | UnitEnum | null $navigationGroup = 'Masyarakat';

    protected static ?string $recordTitleAttribute = 'nama';

    public static function getPluralLabel(): string
    {
        return 'Pengaduan Masyarakat';
    }

    public static function getLabel(): string
    {
        return 'Pengaduan';
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('nama'),
                TextEntry::make('no_hp'),
                TextEntry::make('kategori_pengaduan'),
                TextEntry::make('isi_pengaduan')
                    ->columnSpanFull(),
                TextEntry::make('status_pengaduan'),
                TextEntry::make('lampiran')
                    ->label('Lampiran')
                    ->url(fn($record) => $record->lampiran ? asset('storage/' . $record->lampiran) : null, true) // buka di tab baru
                    ->formatStateUsing(fn($state) => $state ? 'Lihat Lampiran' : '-'),
                TextEntry::make('created_at')
                    ->label('Diajukan Tanggal')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')
                    ->searchable(),
                TextColumn::make('no_hp')
                    ->searchable(),
                TextColumn::make('isi_pengaduan')
                    ->wrap()
                    ->limit(50)
                    ->label('Isi Pengaduan')
                    ->searchable(),
                TextColumn::make('kategori_pengaduan'),
                TextColumn::make('lampiran')
                    ->label('Lampiran')
                    ->url(fn($record) => $record->lampiran ? asset('storage/' . $record->lampiran) : null, true) // buka di tab baru
                    ->formatStateUsing(fn($state) => $state ? 'Lihat Lampiran' : '-'),
                SelectColumn::make('status_pengaduan')
                    ->label('Status Pengaduan')
                    ->options([
                        'Belum Diproses' => 'Belum Diproses',
                        'Sedang Diproses' => 'Sedang Diproses',
                        'Selesai' => 'Selesai',
                    ])
                    ->selectablePlaceholder(false)
                    ->rules(['required'])
                    ->searchable()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label('Diupload Tanggal')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
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
            'index' => ManagePengaduans::route('/'),
        ];
    }
}
