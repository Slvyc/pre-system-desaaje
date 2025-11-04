<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class PendudukBansos extends Model
{
    protected $table = 'penduduk_bansos';

    protected $fillable = [
        'nama',
        'nik'
    ];

    public function penerimaBansos()
    {
        return $this->hasMany(PenerimaBansos::class, 'penduduk_bansos_id');
    }

    // public function setNikAttribute($value)
    // {
    //     $this->attributes['nik'] = Crypt::encryptString($value);
    // }

    // // asesor -> decrypt nik saat diambil
    // public function getNikAttribute($value)
    // {
    //     return Crypt::decryptString($value);
    // }
}
