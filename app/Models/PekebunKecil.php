<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PekebunKecil extends Model
{
    use HasFactory;

    protected $table = 'pekebun_kecil';
    protected $fillable = [
        'id_Pengguna', 
        'Jantina_ID',
        'Jantina', 
        'Warganegara_ID',
        'Warganegara', 
        'Bangsa_ID',
        'Bangsa', 
        'Jalan',
        'Nama_Kampung', 
        'Bandar',
        'Poskod', 
        'U_Negeri_ID',
        'Negeri', 
        'U_Daerah_ID',
        'Daerah', 
        'U_Mukim_ID',
        'Mukim', 
        'U_Kampung_ID',
        'Kampung', 
        'U_Seksyen_ID',
        'Seksyen',
        'Penempatan_ID',
        'Penempatan', 
        'Telefon',
    ];

    public function tanah()
    {
        return $this->hasOne(Tanah::class);
    }
}
