<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AparatDesa extends Model
{
    protected $table = 'aparat_desa';

    protected $fillable = [
        'nama_aparat',
        'jabatan_aparat',
        'foto_aparat',
    ];
}
