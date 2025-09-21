<?php

namespace App\Filament\Resources\Galeris\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class GaleriInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('nama_gambar'),
                TextEntry::make('file_path'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
