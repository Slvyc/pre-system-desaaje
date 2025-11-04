<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisBansos extends Model
{
    protected $table = 'jenis_bansos';

    protected $fillable = [
        'nama_bantuan',
        'deskripsi',
        'sumber_dana'
    ];

    public function penerimaBansos()
    {
        return $this->hasMany(PenerimaBansos::class, 'jenis_bansos_id');
    }
}
