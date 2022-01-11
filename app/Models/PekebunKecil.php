<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PekebunKecil extends Model
{
    use HasFactory;

    public function tanah()
    {
        return $this->hasOne(Tanah::class);
    }
}
