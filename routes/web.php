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

Route::get('blogposts', 'PostsController@index')->name('blogposts');

// Route::get('blog/{id}', ['uses' => 'PostsController@show', 'as' => 'blog.show']);

Route::get('blog/{slug}', 'PostsController@showBySlug')->name('blog.show');


// Admin
Route::get('admin', 'Admin\DashboardController@index')->name('admin');
Route::resource('posts', 'Admin\PostsController'); 
Route::resource('categories', 'Admin\CategoriesController'); 
Route::resource('tags', 'Admin\TagsController');
Route::resource('users', 'Admin\UsersManagementController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('profile/{username}', [
    'as'   => '{username}',
    'uses' => 'ProfileController@show',
    ]
);
