<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KodKursus extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['jadualkursus'];
    public function jadualkursus()
    {
        return $this->hasOne(JadualKursus::class, 'kod_kursus', 'kod_Kursus');
    }
}
