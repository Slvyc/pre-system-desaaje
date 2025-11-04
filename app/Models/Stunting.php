<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stunting extends Model
{
    protected $table = 'kategori_stunting';

    protected $fillable = [
        'nama_kategori',
        'deskripsi'
    ];

    public function dataStunting()
    {
        return $this->hasMany(DataStunting::class, 'kategori_stunting_id');
    }
}
