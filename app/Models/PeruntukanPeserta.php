<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeruntukanPeserta extends Model
{
    use HasFactory;
    protected $guarded = ['id'];


    public function kursus(){
        return $this->belongsTo(JadualKursus::class,'pp_jadual_kursus','id');
    }
}

