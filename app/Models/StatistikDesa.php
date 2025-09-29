<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatistikDesa extends Model
{
    protected $table = 'statistik_desa';

    protected $fillable = [
        'grup',
        'kode_statistik',
        'nama_statistik',
        'nilai',
    ];
}
