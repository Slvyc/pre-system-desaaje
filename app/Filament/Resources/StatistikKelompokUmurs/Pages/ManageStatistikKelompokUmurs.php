<?php

namespace App\Filament\Resources\StatistikKelompokUmurs\Pages;

use App\Filament\Resources\StatistikKelompokUmurs\StatistikKelompokUmurResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageStatistikKelompokUmurs extends ManageRecords
{
    protected static string $resource = StatistikKelompokUmurResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
