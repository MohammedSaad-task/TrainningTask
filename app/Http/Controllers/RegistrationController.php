<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    public function create(){
        return view('register');
    }
    public function store(){
        $user=User::create([
            'name'=> request('name'),
            'email'=> request('email'),
            'password'=> bcrypt(request('password'))
        ]);
        $user->roles()->attach(Role::where('name','user')->first());
        auth()->login($user);

        return redirect('/posts');
        }
}
