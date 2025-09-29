<?php

namespace App\Filament\Resources\StatistikDusuns\Pages;

use App\Filament\Resources\StatistikDusuns\StatistikDusunResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageStatistikDusuns extends ManageRecords
{
    protected static string $resource = StatistikDusunResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
