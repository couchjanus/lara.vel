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

Route::get('hell', function() {
    return view('greeting');
});    


Route::get('test', 'TestController@index');

Route::get('about', 'AboutController')->name('about');

Route::get('hel', function() {
    return view('home.greeting', ['name' => 'Janus']);
});

Route::get('bar', ['uses' => 'TestController@hello', 'as' => 'bar']);

Route::get('bax', 'TestController@bax');
Route::get('baz', 'TestController@baz');
