<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnggaranTerealisasi extends Model
{
    protected $table = 'anggaran_terealisasi';

    protected $fillable = [
        'uraian_id',
        'anggaran',
        'realisasi',
        'lebih_kurang',
        'tahun'
    ];

    public function uraian()
    {
        return $this->belongsTo(Uraian::class, 'uraian_id');
    }
}
