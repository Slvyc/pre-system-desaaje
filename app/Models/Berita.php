<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $table = 'berita';
    protected $fillable = [
        'judul_berita',
        'slug_berita',
        'gambar_berita',
        'bagian_berita',
        'gambar_berita_2',
        'bagian_berita_2',
        'tanggal_berita',
        'views',
    ];
}
