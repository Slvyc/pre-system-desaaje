<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaganDesa extends Model
{
    protected $table = 'bagan_desa';

    protected $fillable = [
        'struktur_organisasi_pemerintahan_desa',
        'struktur_organisasi_badan_permusyawaratan_desa'
    ];
}
