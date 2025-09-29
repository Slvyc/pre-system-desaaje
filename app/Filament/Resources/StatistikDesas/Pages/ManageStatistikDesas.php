<?php

namespace App\Filament\Resources\StatistikDesas\Pages;

use App\Filament\Resources\StatistikDesas\StatistikDesaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageStatistikDesas extends ManageRecords
{
    protected static string $resource = StatistikDesaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
