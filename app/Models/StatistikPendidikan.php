<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatistikPendidikan extends Model
{
    protected $table = 'statistik_pendidikan';

    protected $fillable = [
        'nama_statistik',
        'nilai',
    ];
}
