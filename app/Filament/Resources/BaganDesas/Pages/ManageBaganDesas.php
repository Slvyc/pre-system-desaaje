<?php

namespace App\Filament\Resources\BaganDesas\Pages;

use App\Filament\Resources\BaganDesas\BaganDesaResource;
use App\Models\BaganDesa;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\EditRecord;
use Filament\Resources\Pages\ManageRecords;

class ManageBaganDesas extends EditRecord
{
    protected static string $resource = BaganDesaResource::class;

    public function mount($record = null): void
    {
        // selalu ambil record pertama
        $record = BaganDesa::firstOrCreate([]);
        parent::mount($record->getKey());
    }
}
