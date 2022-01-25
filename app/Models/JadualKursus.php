<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadualKursus extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['kehadiran'];
    public function kehadiran()
    {
        return $this->hasMany(Kehadiran::class);
    }
}
