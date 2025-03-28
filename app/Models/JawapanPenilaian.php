<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JawapanPenilaian extends Model
{
    use HasFactory;
    protected $guarded = ['id'];


    public function peserta()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function kursus()
    {
        return $this->belongsTo(JadualKursus::class,'jadual_kursus_id','id');
    }

}
