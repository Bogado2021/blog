<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**realcion uno a mucho */

    public function post(){
        return $this->hasMany(Post::class);
    }
}
