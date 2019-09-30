<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded=['_token'];
    protected $dates=['created_at'];
    public function comment(){

        return $this->hasMany(Comment::Class)->orderBy('created_at');
    }
    public function category(){
        return $this->belongsTo(Category::Class,'category_id');
    }
}
