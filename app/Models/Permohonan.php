<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permohonan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['kodkursus','peserta','jadualKursus'];

    public function kodkursus()
    {
        return $this->belongsTo(KodKursus::class, 'kod_Kursus', 'kod_kursus');
    }

    public function jadualKursus()
    {
        return $this->belongsTo(JadualKursus::class, 'kod_kursus', 'id');
    }

    public function peserta()
    {
        return $this->belongsTo(User::class, 'no_pekerja', 'id');
    }
}
