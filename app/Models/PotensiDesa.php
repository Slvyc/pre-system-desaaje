<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PotensiDesa extends Model
{
    protected $table = 'potensi_desa';

    protected $fillable = [
        'nama_potensi',
        'slug',
        'gambar_potensi',
        'bagian_potensi',
        'tanggal_potensi',
        'views'
    ];
}
