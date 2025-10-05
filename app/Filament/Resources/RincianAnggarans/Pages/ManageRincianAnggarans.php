<?php

namespace App\Filament\Resources\RincianAnggarans\Pages;

use App\Filament\Resources\RincianAnggarans\RincianAnggaranResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageRincianAnggarans extends ManageRecords
{
    protected static string $resource = RincianAnggaranResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
