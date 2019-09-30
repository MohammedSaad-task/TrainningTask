<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});
//Auth
Route::get('/register','RegistrationController@create')-> name('register');
Route::post('/register/store','RegistrationController@store')->name('register.store');
Route::get('/login','SessionsController@create')->name('login');
Route::post('/login/store','SessionsController@store')->name('login.store');
Route::get('/logout','SessionsController@destroy')->name('logout');
Route::get('/denied','PagesController@denied')->name('denied');
Route::get('/about','PagesController@about')->name('about');
Route::delete('/destroy/{post}','PagesController@destroy')->name('destroy');
Route::delete('/posts/{post}/destroy','CommentsController@destroy')->name('comment.destroy');


Route::group(['middleware'=>'roles','roles'=>['user','editor','admin']], function (){
    Route::get('/posts','PagesController@posts')->name('posts');
    Route::get('/posts/{post}','PagesController@show')->name('show');
    Route::get('/category/{name}','PagesController@category')->name('category');
    Route::post('/posts/{post}/store','CommentsController@store')->name('comments.store');


});

Route::group(['middleware'=>'roles','roles'=>['admin']], function (){
    Route::get('/admin','PagesController@admin')->name('admin');
    Route::post('/addRole','PagesController@addRole')->name('addRole');
    Route::post('/posts/store','PagesController@store')->name('posts.store');

});




