<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatistikKelompokUmur extends Model
{
    protected $table = 'statistik_kelompok_umur';

    protected $fillable = [
        'rentang_umur',
        'jumlah',
    ];
}
