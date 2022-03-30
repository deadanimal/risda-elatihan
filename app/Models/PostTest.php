<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostTest extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['multiple'];

    public function multiple()
    {
        return $this->hasMany(JawapanMultiplePost::class, 'post_test_id', 'id');
    }
}
