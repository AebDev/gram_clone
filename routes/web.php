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

use App\Mail\NewUserWelcomeMail;

Auth::routes();

Route::get('/email',function(){
    return new NewUserWelcomeMail;
});

Route::post('/follow/{user}', 'FollowsController@store');

Route::patch('/profile/{user}','ProfileController@update')->name('profile.update');

Route::get('/', 'PostsController@index');


Route::get('/profile/{user}/edit','ProfileController@edit')->name('profile.edit');

Route::post('/p','PostsController@store')->name('post.store');

Route::get('/p/create','PostsController@create')->name('post.create');

Route::get('/p/{post}','PostsController@show')->name('post.show');

Route::get('/profile/{user}', 'ProfileController@index')->name('profile.show');
