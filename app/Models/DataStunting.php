<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataStunting extends Model
{
    protected $table = 'data_stunting';

    protected $fillable = [
        'kategori_stunting_id',
        'tahun',
        'jumlah'
    ];

    public function kategoriStunting()
    {
        return $this->belongsTo(Stunting::class, 'kategori_stunting_id');
    }
}
