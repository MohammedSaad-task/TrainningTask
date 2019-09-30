<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $fillable = [
        'body',
    ];

    public function posts(){

        return $this->belongsTo(Post::Class,'post_id');
    }

}
