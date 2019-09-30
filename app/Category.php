<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded=['_token'];
    protected $dates=['created_at'];
    public function post(){
        return $this->hasMany(Post::class);
    }

}
