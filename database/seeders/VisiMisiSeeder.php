<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\VisiMisi;

class VisiMisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VisiMisi::firstOrCreate(
            ['id' => 1],
            [
                'visi' => 'Menjadi fakultas unggul... (Dump)',
                'misi' => '1. Menyelenggarakan pendidikan...(Dump)'
            ]
        );
    }
}
