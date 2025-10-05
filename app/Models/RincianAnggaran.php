<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RincianAnggaran extends Model
{
    protected $table = 'rincian_anggaran';

    protected $fillable = [
        'anggaran_terealisasi_id',
        'nama_rincian',
        'anggaran',
        'realisasi',
        'lebih_kurang',
    ];


    // yang punya foreign key belongs to
    public function anggaran()
    {
        return $this->belongsTo(AnggaranTerealisasi::class, 'anggaran_terealisasi_id');
    }
}
