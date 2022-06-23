<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KehadiranPusatLatihan extends Model
{
    use HasFactory;

    public function tempat_kursus()
    {
        return $this->belongsTo(Agensi::class,'agensi_id','id');
    }

    public function peserta()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function kursus()
    {
        return $this->belongsTo(JadualKursus::class,'jadual_kursus_id','id');
    }


}
