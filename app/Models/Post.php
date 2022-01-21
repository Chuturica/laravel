<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    protected $guarded =[];

    protected $with = ['category','author'];
    //protected $fillable = ['title','excerpt','body'];

    public function category()
    {
        # code...
        // hasOne, hasManny, belongsTo, belongsToMeny
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        # code...
        return $this->belongsTo(User::class,'user_id');
    }
}
