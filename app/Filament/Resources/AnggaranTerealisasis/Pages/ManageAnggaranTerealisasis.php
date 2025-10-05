<?php

namespace App\Filament\Resources\AnggaranTerealisasis\Pages;

use App\Filament\Resources\AnggaranTerealisasis\AnggaranTerealisasiResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageAnggaranTerealisasis extends ManageRecords
{
    protected static string $resource = AnggaranTerealisasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
