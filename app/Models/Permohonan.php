<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permohonan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['kodkursus'];

    public function kodkursus()
    {
        return $this->belongsTo(KodKursus::class, 'kod_kursus', 'kod_Kursus');
    }
}
