<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kehadiran extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['staff'];

    public function staff()
    {
        return $this->belongsTo(User::class, 'no_pekerja', 'id');
    }
}
