<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $guarded=['_token'];

    public function posts(){

        return $this->belongsTo(Post::Class,'post_id');
    }

}
