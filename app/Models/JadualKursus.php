<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadualKursus extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    // protected $with = ['preposttest', 'tempat', 'status_pelaksanaan', 'kodkursus'];

    public function kehadiran()
    {
        return $this->hasMany(Kehadiran::class,'jadual_kursus_id');
    }
    public function aturcara()
    {
        return $this->hasMany(Aturcara::class, 'ac_jadual_kursus');
    }
    public function kodkursus()
    {
        return $this->hasOne(KodKursus::class, 'id', 'kod_kursus');
    }

    public function penceramah()
    {
        return $this->hasMany(PenceramahKonsultan::class, 'pc_jadual_kursus');
    }

    public function preposttest()
    {
        return $this->hasMany(PrePostTest::class);
    }
    public function tempat()
    {
        return $this->belongsTo(Agensi::class, 'kursus_tempat', 'id');
    }
    public function status_pelaksanaan()
    {
        return $this->belongsTo(StatusPelaksanaan::class, 'kursus_status_pelaksanaan', 'id');
    }
    public function posttest()
    {
        return $this->hasMany(PostTest::class);
    }

    public function pengendali()
    {
        return $this->belongsTo(Agensi::class, 'kursus_pengendali_latihan', 'id');
    }

    public function pemohon()
    {
        return $this->hasMany(Permohonan::class, 'kod_kursus', 'id');
    }

    public function agensi() {
        return $this->belongsTo(Agensi::class,'kod_agensi', 'id');
    }


    public function pencalonan()
    {
        return $this->hasMany(PencalonanPeserta::class, 'jadual', 'id');
    }

    public function perbelanjaan()
    {
        return $this->hasOne(PerbelanjaanKursus::class, 'jadualkursus_id', 'id');
    }

    public function kehadiran_pl()
    {
        return $this->hasMany(KehadiranPusatLatihan::class,'jadual_kursus_id','id');
    }

    public function peruntukan(){
        return $this->hasMany(PeruntukanPeserta::class,'id','pp_jadual_kursus');
    }

    public function bidang()
    {
        return $this->belongsTo(BidangKursus::class, 'kursus_bidang','id' );
    }

    public function kategori_kursus()
    {
        return $this->belongsTo(KategoriKursus::class, 'kod_kategori','id' );
    }

    public function penilaianpeserta()
    {
        return $this->hasMany(PenilaianPeserta::class, 'id','kod_kursus' );
    }

    public function pretest()
    {
        return $this->hasMany(PrePostTest::class, 'id');
    }






}
