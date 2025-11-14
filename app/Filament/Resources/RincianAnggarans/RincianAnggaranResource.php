<?php

namespace App\Filament\Resources\RincianAnggarans;

use App\Filament\Resources\RincianAnggarans\Pages\ManageRincianAnggarans;
use App\Models\RincianAnggaran;
use BackedEnum;
use UnitEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use App\Models\AnggaranTerealisasi;
use Filament\Forms\Get;
use Filament\Forms\Set;

class RincianAnggaranResource extends Resource
{
    protected static ?string $model = RincianAnggaran::class;

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-currency-dollar';

    protected static string | UnitEnum | null $navigationGroup = 'Anggaran';

    protected static ?int $navigationSort = 1;

    public static function getPluralLabel(): string
    {
        return 'Rincian Nilai Anggaran';
    }

    public static function getLabel(): string
    {
        return 'Rincian Nilai Anggaran';
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('anggaran_terealisasi_id')
                    ->label('Nama Uraian')
                    ->searchable()
                    ->preload()
                    ->options(function () {
                        return AnggaranTerealisasi::with('uraian')
                            ->get()
                            ->mapWithKeys(function ($item) {
                                return [
                                    $item->id => $item->uraian->nama_uraian . ' (' . $item->uraian->tahun . ')',
                                ];
                            });
                    })
                    ->getSearchResultsUsing(function (string $query) {
                        return AnggaranTerealisasi::with('uraian')
                            ->whereHas('uraian', function ($q) use ($query) {
                                $q->where('nama_uraian', 'like', "%{$query}%")
                                    ->orWhere('tahun', 'like', "%{$query}%");
                            })
                            ->get()
                            ->mapWithKeys(function ($item) {
                                return [
                                    $item->id => $item->uraian->nama_uraian . ' (' . $item->uraian->tahun . ')',
                                ];
                            });
                    })
                    ->getOptionLabelUsing(function ($value) {
                        $item = AnggaranTerealisasi::with('uraian')->find($value);
                        return $item
                            ? $item->uraian->nama_uraian . ' (' . $item->uraian->tahun . ')'
                            : null;
                    })
                    ->reactive(),
                TextInput::make('nama_rincian')
                    ->required()
                    ->label('Nama Rincian Anggaran')
                    ->rule(function (callable $get) {
                        return function ($attribute, $value, $fail) use ($get) {
                            $anggaranId = $get('anggaran_terealisasi_id');
                            if (! $anggaranId) return;

                            // Cek apakah sudah ada nama rincian yang sama dalam uraian itu
                            $exists = RincianAnggaran::where('anggaran_terealisasi_id', $anggaranId)
                                ->where('nama_rincian', $value)
                                ->exists();

                            if ($exists) {
                                $fail("Nama rincian '$value' sudah ada pada uraian ini.");
                            }
                        };
                    }),
                TextInput::make('anggaran')
                    ->label('Nilai Anggaran')
                    ->prefix('Rp')
                    ->numeric()
                    ->required()
                    ->reactive()
                    ->afterStateUpdated(function ($state, callable $set, callable $get) {
                        $anggaranId = $get('anggaran_terealisasi_id');
                        if (! $anggaranId) return null;

                        $anggaran = AnggaranTerealisasi::find($anggaranId);
                        $totalRincian = RincianAnggaran::where('anggaran_terealisasi_id', $anggaranId)->sum('anggaran');
                        $sisa = ($anggaran?->anggaran ?? 0) - $totalRincian;

                        return 'max:' . $sisa;
                    })
                    ->helperText(function (callable $get) {
                        $anggaranId = $get('anggaran_terealisasi_id');
                        if (! $anggaranId) return null;

                        $anggaran = AnggaranTerealisasi::find($anggaranId);
                        $totalRincian = RincianAnggaran::where('anggaran_terealisasi_id', $anggaranId)->sum('anggaran');
                        $sisa = ($anggaran?->anggaran ?? 0) - $totalRincian;

                        return 'Sisa anggaran tersedia: Rp ' . number_format($sisa, 0, ',', '.');
                    }),
                TextInput::make('realisasi')
                    ->label('Nilai Realisasi')
                    ->prefix('Rp')
                    ->numeric()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('anggaran.uraian.tahun')
                    ->sortable()
                    ->label('Tahun Anggaran')
                    ->searchable(),

                TextColumn::make('anggaran.uraian.nama_uraian')
                    ->sortable()
                    ->label('Nama Uraian')
                    ->searchable(),

                TextColumn::make('nama_rincian')
                    ->label('Nama Rincian Anggaran')
                    ->searchable(),

                TextColumn::make('anggaran')
                    ->formatStateUsing(fn($state) => 'Rp. ' . number_format($state, 2, ',', '.'))
                    ->label('Nilai Anggaran')
                    ->searchable(),

                TextColumn::make('realisasi')
                    ->formatStateUsing(fn($state) => 'Rp. ' . number_format($state, 2, ',', '.'))
                    ->label('Nilai Realisasi')
                    ->searchable(),

                TextColumn::make('lebih_kurang')
                    ->formatStateUsing(fn($state) => 'Rp. ' . number_format($state, 2, ',', '.'))
                    ->label('Nilai Lebih Kurang')
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
            'index' => ManageRincianAnggarans::route('/'),
        ];
    }
}
