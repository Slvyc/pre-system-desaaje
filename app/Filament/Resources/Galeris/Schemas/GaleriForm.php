<?php

namespace App\Filament\Resources\Galeris\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class GaleriForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama_gambar')
                    ->required(),
                TextInput::make('file_path')
                    ->required(),
            ]);
    }
}
