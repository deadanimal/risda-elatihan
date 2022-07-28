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

    public function negeri()
    {
        return $this->belongsTo(Negeri::class,'U_Negeri_ID','U_Negeri_ID');
    }

    public function daerah()
    {
        return $this->belongsTo(Daerah::class,'U_Daerah_ID','U_Daerah_ID');
    }

    public function kehadiran_pl()
    {
        return $this->hasMany(KehadiranPusatLatihan::class);
    }






}
