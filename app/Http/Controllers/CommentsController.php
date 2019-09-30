<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
class CommentsController extends Controller
{
    public function store(Post $post){
        Comment::create([
                'body'=>request()->commentBody,
                'post_id'=> $post->id
            ]);
        return back();
    }
    public function destroy(Post $post){
        // $post=Post::find($id);
        $post->comment()->delete();
        return back();
    }


}
