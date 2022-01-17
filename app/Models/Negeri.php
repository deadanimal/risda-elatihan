<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Negeri extends Model
{
    use HasFactory;

    public function daerahs()
    {
        return $this->hasMany(Daerah::class);
    }

    public function mukims()
    {
        return $this->hasMany(Mukim::class);
    }

    public function parlimens()
    {
        return $this->hasMany(Parlimen::class);
    }

    public function duns()
    {
        return $this->hasMany(Dun::class);
    }

    public function kampungs()
    {
        return $this->hasMany(Kampung::class);
    }
}
