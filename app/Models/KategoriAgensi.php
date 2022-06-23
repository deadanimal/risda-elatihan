<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriAgensi extends Model
{
    use HasFactory;

    public function agensi()
    {
        return $this->hasMany(Agensi::class,'id','kategori_agensi');
    }
}
