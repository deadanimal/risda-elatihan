<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stesen extends Model
{
    use HasFactory;

    public function negeri()
    {
        return $this->hasOne(Negeri::class, 'U_Negeri_ID', 'U_Negeri_ID');
    }

    public function pusat_tanggungjawab()
    {
        return $this->hasOne(PusatTanggungjawab::class, 'kod_PT', 'Kod_PT');
    }
}
