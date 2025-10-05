<?php

namespace App\Models;

use App\Models\Uraian;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';

    protected $fillable = [
        'nama_kategori'
    ];

    public function uraians()
    {
        return $this->hasMany(Uraian::class);
    }
}
