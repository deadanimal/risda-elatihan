<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PencalonanPeserta extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    // protected $with = ['permohonan','kehadiran','jadualKursus', 'maklumat_peserta'];

    // public function permohonan()
    // {
    //     return $this->belongsTo(Permohonan::class, 'no_pekerja', 'peserta');
    // }

    public function kehadiran()
    {
        return $this->hasMany(Kehadiran::class, 'no_pekerja', 'peserta');
    }

    public function jadualKursus()
    {
        return $this->belongsTo(JadualKursus::class, 'jadual', 'id');
    }

    public function maklumat_peserta()
    {
        return $this->belongsTo(User::class, 'peserta', 'id');
    }

}
