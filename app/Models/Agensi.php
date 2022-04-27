<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agensi extends Model
{
    use HasFactory;

    public function penceramahKonsultan()
    {
        return $this->hasMany(PenceramahKonsultan::class, 'pc_id', 'id');
    }

    public function kategori()
    {
        return $this->belongsTo(KategoriAgensi::class, 'kategori_agensi', 'id');
    }

    public function penilaian()
    {
        return $this->hasMany(PenilaianEjenPelaksana::class);
    }

}
