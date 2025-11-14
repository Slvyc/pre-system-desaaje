<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Uraian extends Model
{
    protected $table = 'uraian';

    protected $fillable = [
        'kategori_id',
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


    // validasi unique nama_uraian per tahun sebelum menyimpan, biar tidak sama tiap tahun nya
    // protected static function booted()
    // {
    //     static::saving(function ($model) {
    //         $exists = Uraian::where('nama_uraian', $model->nama_uraian)
    //             ->where('tahun', $model->tahun)
    //             ->where('id', '!=', $model->id)
    //             ->exists();

    //         if ($exists) {
    //             throw new \Exception("Nama uraian '{$model->nama_uraian}' sudah ada pada tahun {$model->tahun}.");
    //         }
    //     });
    // }
}
