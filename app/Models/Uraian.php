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

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function anggarans()
    {
        return $this->hasMany(AnggaranTerealisasi::class);
    }

    // relasi ke children (banyak anak)
    public function childrens()
    {
        return $this->hasMany(Uraian::class, 'parent_id');
    }

    // self-relation
    public function parent()
    {
        return $this->belongsTo(Uraian::class, 'parent_id');
    }
}
