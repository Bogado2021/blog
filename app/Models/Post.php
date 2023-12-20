<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**relacion muchos a uno */

    public function users(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    /**relacion muchos a muchoa */

    public function tag(){
        return $this->belongsToMany(Tag::class);
     }

     /**relacion polimorfica uno a uno */

     public function image(){
        return $this->morphOne(Image::class, 'imageable');
     }
}
