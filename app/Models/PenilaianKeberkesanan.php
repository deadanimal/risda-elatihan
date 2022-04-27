<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenilaianKeberkesanan extends Model
{
    use HasFactory;

    public function kehadiran()
    {
        return $this->hasOne(User::class, 'id', 'nama_pengganti');
    }
}
