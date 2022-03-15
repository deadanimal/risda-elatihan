<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agensi extends Model
{
    use HasFactory;

    public function penceramahKonsultan()
    {
        return $this->hasMany(PenceramahKonsultan::class, 'pc_id', 'id');
    }

}
