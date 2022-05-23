<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenilaianEjenPelaksana extends Model
{
    use HasFactory;

    public function agensi()
    {
        return $this->belongsTo(Agensi::class, 'agensi_id', 'id');
    }

    public function kursus()
    {
        return $this->belongsTo(JadualKursus::class, 'jadual_kursus_id', 'id');
    }

    public function penceramahKonsultan()
    {
        return $this->belongsTo(PenceramahKonsultan::class,'penceramah_konsultan_id','id');
    }




}
