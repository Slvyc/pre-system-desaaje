<?php

namespace App\Filament\Resources\Uraians\Pages;

use App\Filament\Resources\Uraians\UraianResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageUraians extends ManageRecords
{
    protected static string $resource = UraianResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
