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



Auth::routes();
Route::get ('/','HomeController@index')->name('home');


Route::get('/user/config/', 'UserController@config')->name('User.config');
Route::post('/user/config/', 'UserController@update')->name('User.update');
Route::get('/user/avatar/{filename}', 'UserController@getImage')->name('User.avatar');
Route::get('/user/profile/{id}','UserController@getProfile')->name('User.profile');

//image
Route::get('/image/save','ImageController@create')->name('Image.create');
Route::post('/image/save','ImageController@save')->name('Image.save');
Route::get('/image/file/{filename}','ImageController@getImage')->name('Image.file');
Route::get('/image/{id}','ImageController@detail')->name('Image.detail');
Route::get('home/{id}','ImageController@viewComments')->name('Image.comments');


//comments
Route::post('/comment/save','CommentController@save')->name('Comment.save');
Route::get('/comment/delete/{id}')->name('Comment.delete');
