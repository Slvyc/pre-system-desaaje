<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PenerimaBansos extends Model
{
    protected $table = 'penerima_bansos';

    protected $fillable = [
        'penduduk_bansos_id',
        'jenis_bansos_id',
    ];

    public function pendudukBansos()
    {
        return $this->belongsTo(PendudukBansos::class, 'penduduk_bansos_id');
    }

    // Relasi ke jenis_bantuan
    public function jenisBansos()
    {
        return $this->belongsTo(JenisBansos::class, 'jenis_bansos_id');
    }
}
