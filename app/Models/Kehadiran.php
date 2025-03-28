<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Kehadiran extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    // protected $with = ['staff'];

    // public function aturcara()
    // {
    //     return $this->belongsTo(Aturcara::class, 'id', 'jadual_kursus_ref');
    // }

    // public function jadual_kursus()
    // {
    //     return $this->belongsTo(JadualKursus::class, 'jadual_kursus_id', 'id');
    // }

    public function staff()
    {
        return $this->hasOne(User::class, 'id', 'no_pekerja');
    }

    public function aturcara()
    {
        return $this->belongsTo(Aturcara::class, 'jadual_kursus_ref', 'id');
    }

    public function pengganti()
    {
        return $this->hasOne(User::class, 'id', 'nama_pengganti');
    }

    public function penilaiankeberkesanan()
    {
        return $this->hasOne(PenilaianKeberkesanan::class, 'kehadiran_id','id');
    }

    public function kursus()
    {
        return $this->belongsTo(JadualKursus::class,'jadual_kursus_id','id');
    }

    public function jadual()
    {
        return $this->belongsTo(JadualKursus::class, 'kod_kursus', 'kursus_kod_nama_kursus');
    }


}
