<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Uraian extends Model
{
    protected $table = 'uraian';

    protected $fillable = [
        'kategori_id',
        'parent_id',
        'nama_uraian',
        'tahun'
    ];

    // public function anggaranUraian()
    // {
    //     return $this->hasMany(AnggaranTerealisasi::class, 'uraian_id');
    // }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function anggaranTerealisasi()
    {
        return $this->hasOne(AnggaranTerealisasi::class, 'uraian_id');
    }
}
