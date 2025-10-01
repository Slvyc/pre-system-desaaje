<?php

namespace App\Filament\Resources\StatistikPendidikans\Pages;

use App\Filament\Resources\StatistikPendidikans\StatistikPendidikanResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageStatistikPendidikans extends ManageRecords
{
    protected static string $resource = StatistikPendidikanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
