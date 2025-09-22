<?php

namespace App\Filament\Resources\PotensiDesas\Pages;

use App\Filament\Resources\PotensiDesas\PotensiDesaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManagePotensiDesas extends ManageRecords
{
    protected static string $resource = PotensiDesaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
