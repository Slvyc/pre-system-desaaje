<?php

namespace App\Filament\Resources\VisiMisis\Pages;

use App\Filament\Resources\VisiMisis\VisiMisiResource;
use App\Models\VisiMisi;
use Filament\Resources\Pages\EditRecord;
use Filament\Actions\CreateAction;

class ManageVisiMisis extends EditRecord
{
    protected static string $resource = VisiMisiResource::class;

    public function mount($record = null): void
    {
        // selalu ambil record pertama
        $record = VisiMisi::firstOrCreate([]);
        parent::mount($record->getKey());
    }
}
