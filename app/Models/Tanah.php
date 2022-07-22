<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tanah extends Model
{
    use HasFactory;
    public function tanaman()
    {
        return $this->hasMany(Tanaman::class, 'id_tanah', 'id');
    }
}
