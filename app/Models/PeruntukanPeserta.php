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


    public function pt(){
    return $this->belongsTo(PusatTanggungjawab::class, 'pp_pusat_tanggungjawab', 'id');
}

    public function negeri()
    {
        return $this->hasOne(Negeri::class, 'U_Negeri_ID', 'pp_negeri');
    }

    public function pusat_tanggungjawab()
    {
        return $this->hasOne(PusatTanggungjawab::class, 'kod_PT', 'pp_pusat_tanggungjawab');
    }
}

