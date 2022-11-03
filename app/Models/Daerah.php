<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daerah extends Model
{
    use HasFactory;
    public function mukims()
    {
        return $this->hasMany(Mukim::class);
    }

    public function negeri()
    {
        return $this->belongsTo(Negeri::class, 'U_Negeri_ID', 'U_Negeri_ID');
    }

    public function agensi()
    {
        return $this->hasMany(Agensi::class);
    }
}
