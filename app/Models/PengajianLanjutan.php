<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajianLanjutan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function pengguna()
    {
        return $this->hasOne(User::class, 'id', 'staf');
    }

    public function data_pusat_tanggungjawab()
    {
        return $this->hasOne(PusatTanggungjawab::class, 'id', 'pusat_tanggungjawab');
    }

    public function data_staf()
    {
        return $this->hasOne(Staf::class, 'id_Pengguna', 'staf');
    }

    public function perbelanjaan()
    {
        return $this->hasMany(PerbelanjaanYuran::class, 'id_pengajian_lanjutan', 'id');
    }

    public function perbelanjaan_pl()
    {
        return $this->hasOne(PerbelanjaanPengajianLanjutan::class, 'pengguna_id', 'id');
    }

    public function ipt()
    {
        return $this->hasOne(Agensi::class, 'id', 'anjuran');
    }
}
