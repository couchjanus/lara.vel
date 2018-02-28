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

Route::get('/trashed', 'Admin\UsersManagementController@indexTrashed')->name('users.trashed');

Route::post('/restore/{id}', 'Admin\UsersManagementController@restore')->name('users.restore');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('profile/{username}', [
    'as'   => '{username}',
    'uses' => 'ProfileController@show',
    ]
);

Route::get('/email', function () {
    return new App\Mail\ContactEmail();
});

Route::get('contact', 'ContactController@create')->name('contact.create');
Route::post('contact', 'ContactController@store')->name('contact.store');

Route::get('/verify/token/{token}', 'Auth\VerificationController@verify')->name('auth.verify'); 
Route::get('/verify/resend', 'Auth\VerificationController@resend')->name('auth.verify.resend');

