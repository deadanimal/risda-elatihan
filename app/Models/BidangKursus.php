<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BidangKursus extends Model
{
    use HasFactory;

    public function kodkursus()
    {
        return $this->hasMany(KodKursus::class, 'U_Bidang_Kursus', 'id');
    }

    public function jadual_kursus()
    {
        return $this->hasMany(JadualKursus::class, 'kursus_bidang', 'id');
    }

    public function matlamat_kursus()
    {
        return $this->hasOne(MatlamatBilanganKursus::class, 'bidang_ref', 'id');
    }

    public function matlamat_peserta()
    {
        return $this->hasOne(MatlamatTahunanPeserta::class, 'bidang_ref', 'id');
    }

    public function matlamat_perbelanjaan()
    {
        return $this->hasOne(MatlamatTahunanPerbelanjaan::class, 'bidang_ref', 'id');
    }

    public function matlamat_panggilan_peserta()
    {
        return $this->hasOne(MatlamatTahunanPanggilanPeserta::class, 'bidang_ref', 'id');
    }

    public function kategori()
    {
        return $this->hasMany(BidangKursus::class);
    }
}
