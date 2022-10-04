<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PusatTanggungjawab extends Model
{
    use HasFactory;

    public function staff()
    {
        return $this->hasMany(Staf::class, 'kod_PT', 'Kod_PT');
    }

    public function negeri()
    {
        return $this->hasOne(Negeri::class,'Negeri_Rkod','kod_Negeri_PT');
    }

    public function peruntukan(){
        return $this->hasMany(PeruntukanPeserta::class,'id','pp_jadual_kursus');
    }

    public function perbelanjaankursus(){
        return $this->hasOne(PerbelanjaanKursus::class,'kod_PT','Kod_PT');
    }

    public function peruntukanpeserta(){
        return $this->hasMany(PeruntukanPeserta::class,'kod_PT','pp_pusat_tanggungjawab');
    }




}
