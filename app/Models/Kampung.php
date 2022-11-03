<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kampung extends Model
{
    use HasFactory;

    public function negeri()
    {
        return $this->hasOne(Negeri::class, 'U_Negeri_ID', 'U_Negeri_ID');
    }

    public function daerah()
    {
        return $this->hasOne(Daerah::class, 'U_Daerah_ID', 'U_Daerah_ID');
    }

    public function mukim()
    {
        return $this->hasOne(Mukim::class, 'Kod_Mukim', 'Kod_Mukim');
    }
}
