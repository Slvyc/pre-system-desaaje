<?php

namespace Database\Seeders;

use App\Models\Sejarah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SejarahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sejarah::firstOrCreate(
            ['id' => 1],
            [
                'judul_sejarah' => '(Dump)',
                'bagian_sejarah' => '(Dump)'
            ]
        );
    }
}
