<?php

namespace App\Filament\Resources\Sejarahs\Pages;

use App\Filament\Resources\Sejarahs\SejarahResource;
use App\Models\Sejarah;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\EditRecord;

class ManageSejarahs extends EditRecord
{
    protected static string $resource = SejarahResource::class;

    public function mount($record = null): void
    {
        // selalu ambil record pertama
        $record = Sejarah::firstOrCreate([]);
        parent::mount($record->getKey());
    }
}
