<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function posts()
    {
        # code...
        // hasOne, hasManny, belongsTo, belongsToMeny
        return $this->hasMany(Post::class);
    }
}
