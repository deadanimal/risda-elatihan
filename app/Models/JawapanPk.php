<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JawapanPk extends Model
{
    use HasFactory;

    protected $table = 'jawapan_multiple_post';
    protected $guarded = ['id'];
}
