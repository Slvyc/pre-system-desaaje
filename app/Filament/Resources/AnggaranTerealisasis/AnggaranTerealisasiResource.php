<?php

namespace App\Filament\Resources\AnggaranTerealisasis;

use App\Filament\Resources\AnggaranTerealisasis\Pages\ManageAnggaranTerealisasis;
use App\Models\AnggaranTerealisasi;
use App\Models\Uraian;
use BackedEnum;
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
use Illuminate\Database\Eloquent\Relations\Relation;

use function Laravel\Prompts\select;

class AnggaranTerealisasiResource extends Resource
{
    protected static ?string $model = AnggaranTerealisasi::class;

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-currency-dollar';

    protected static string | UnitEnum | null $navigationGroup = 'Anggaran';

    protected static ?int $navigationSort = 1;

    public static function getPluralLabel(): string
    {
        return 'Nilai Anggaran Terealisasi';
    }

    public static function getLabel(): string
    {
        return 'Nilai Anggaran Terealisasi';
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('uraian_id')
                    ->label('Nama Uraian')
                    ->rules([
                        function (callable $get) {
                            return function ($attribute, $value, $fail) use ($get) {
                                $uraian = Uraian::find($value);
                                if (! $uraian) return;

                                $tahun = $uraian->tahun;

                                $exists = AnggaranTerealisasi::where('uraian_id', $value)
                                    ->where('id', '!=', $get('id'))
                                    ->whereHas('uraian', function ($q) use ($tahun) {
                                        $q->where('tahun', $tahun);
                                    })
                                    ->exists();

                                if ($exists) {
                                    $fail("Uraian ini sudah digunakan pada tahun {$tahun}.");
                                }
                            };
                        }
                    ])
                    ->options(
                        Uraian::all()->mapWithKeys(function ($u) {
                            return [
                                $u->id => "{$u->nama_uraian} ({$u->tahun})"
                            ];
                        })
                    )
                    ->getSearchResultsUsing(function (string $query) {
                        return Uraian::where('nama_uraian', 'like', "%{$query}%")
                            ->get()
                            ->mapWithKeys(function ($u) {
                                return [
                                    $u->id => "{$u->nama_uraian} ({$u->tahun})"
                                ];
                            });
                    })
                    ->getOptionLabelUsing(function ($value) {
                        $u = Uraian::find(id: $value);
                        return $u ? "{$u->nama_uraian} ({$u->tahun})" : null;
                    })
                    ->searchable()
                    ->required(),
                TextInput::make('anggaran')
                    ->label('Nilai Anggaran')
                    ->prefix('Rp')
                    ->numeric()
                    ->nullable(),
                TextInput::make('realisasi')
                    ->label('Nilai Realisasi')
                    ->prefix('Rp')
                    ->numeric()
                    ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('uraian.tahun')
                    ->sortable()
                    ->label('Tahun Anggaran')
                    ->searchable(),

                TextColumn::make('uraian.nama_uraian')
                    ->label('Nama Uraian')
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
            'index' => ManageAnggaranTerealisasis::route('/'),
        ];
    }
}
