<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Role;
use App\Comment;
use App\Category;
use DB;
class PagesController extends Controller
{
    public function posts(){

        $posts=Post::all();
        return view('content.posts',compact('posts'));
    }

    public function store(){
        request()->validate([
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
            'name'=> 'required'
        ]);
        $img=null;
        if(request()->imgUrl){
        $img=time().'.'.request()->imgUrl->getClientOriginalExtension();
        request()->imgUrl->move(public_path('upload'),$img);
        }
        $cat_id=Category::where('name',request()->name)->value('id');
        Post::create([
            'title'=>request()->title,
            'body'=>request()->body,
            'imgUrl'=>$img,
            'category_id'=>$cat_id,
            ]);
        return back();
    }

    public function show(Post $post){
        // $post=Post::find($id);
        return view('content.show',compact('post'));
    }

    public function destroy(Post $post){
        // $post=Post::find($id);
        $post->comment()->delete();
        $post->delete();

        return back();
    }

    public function category($name){
        $cat_id=Category::where('name',$name)->value('id');
        $posts=Post::where('category_id',$cat_id)->get();
        return view('content.category',compact('posts'));
    }

    public function addRole(){
        $user=User::where('email',request('email'))->first();
        $user->roles()->detach();
        if(request()->user){
            $user->roles()->attach(Role::where('name','user')->first());

        }
        if(request()->editor){
            $user->roles()->attach(Role::where('name','editor')->first());

        }
        if(request()->admin){
            $user->roles()->attach(Role::where('name','admin')->first());

        }
        return back();
    }

    public function admin(){
        $users=User::all();
        return view('admin',['users'=>$users]);
    }

    public function denied(){
        return view('denied');
    }
    public function about(){
        return view('about');
    }
}
