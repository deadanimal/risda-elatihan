<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staf extends Model
{
    use HasFactory;

    public function pengguna()
    {
        return $this->belongsTo(User::class, 'id_Pengguna', 'id');
    }

    public function pt()
    {
        return $this->belongsTo(PusatTanggungjawab::class, 'Kod_PT', 'kod_PT');
    }
}
