<?php

namespace App\Filament\Resources\JenisBansos\Pages;

use App\Filament\Resources\JenisBansos\JenisBansosResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageJenisBansos extends ManageRecords
{
    protected static string $resource = JenisBansosResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
