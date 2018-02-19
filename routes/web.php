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

Route::get('blog', function () {
    return view('blog.index');
})->name('blog');

// Route::get('blog', 'PostsController@index')->name('blog');

Route::get('blogposts', 'PostsController@index')->name('blogposts');

Route::get('blogposts/{id}', ['uses' => 'PostsController@showPost', 'as' => 'blogposts.show']);

Route::get('blog/{id}', ['uses' => 'PostsController@show', 'as' => 'blog.show']);


// Admin

Route::get('admin', 'Admin\DashboardController@index')->name('admin');

Route::resource('posts', 'Admin\PostsController'); 

Route::resource('categories', 'Admin\CategoriesController'); 

Route::resource('tags', 'Admin\TagsController');
