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

Route::get('/', function () {
    return view('welcome');
});

Route::get('blog', ['uses' => 'PostsController@index', 'as' => 'blog']);

Route::get('blog/create', ['uses' => 'PostsController@create', 'as' => 'create']);
Route::post('blog/store', ['uses' => 'PostsController@store', 'as' => 'store']);

Route::get('blog/{id}', ['uses' => 'PostsController@show', 'as' => 'blog.show']);



