<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerbelanjaanKursus extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function jadual_kursus()
    {
        return $this->hasOne(JadualKursus::class, 'id', 'jadualkursus_id');
    }
}
