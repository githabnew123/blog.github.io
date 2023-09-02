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

Route::get('/', 'PostController@index');

Route::resource('/my_post', 'PostController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => ['role:admin']], function () {
    Route::resource('/category', 'CategoryController');
});

Route::resource('/user','UserController');

Route::resource('/comment','CommentController');

Route::post('/getcomments','CommentController@getcomments')->name('getcomments');