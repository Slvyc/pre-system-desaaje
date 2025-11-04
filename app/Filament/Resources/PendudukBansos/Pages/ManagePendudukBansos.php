<?php

namespace App\Filament\Resources\PendudukBansos\Pages;

use App\Filament\Resources\PendudukBansos\PendudukBansosResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManagePendudukBansos extends ManageRecords
{
    protected static string $resource = PendudukBansosResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
