<?php

namespace App\Filament\Resources\DataStuntings\Pages;

use App\Filament\Resources\DataStuntings\DataStuntingResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageDataStuntings extends ManageRecords
{
    protected static string $resource = DataStuntingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
