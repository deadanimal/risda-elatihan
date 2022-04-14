<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriKursus extends Model
{
    use HasFactory;

    public function bidang()
    {
        return $this->belongsTo(BidangKursus::class, 'U_Bidang_Kursus', 'id');
    }

    public function matlamat_kursus()
    {
        return $this->hasOne(MatlamatBilanganKursus::class, 'bidang', 'nama_Kategori_Kursus');
    }
}
