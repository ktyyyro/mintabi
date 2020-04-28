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
    return view('top');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/travel_brochure', 'TravelBrochureController')->except(['update', 'destroy', 'index']);

Route::resource('/user', 'UserController')->except(['store', 'create']);
Route::post('/user', 'UserController@search')->name('user.search');

// ユーザーフォロー処理
Route::put('/user/{name}/follow', 'UserController@follow')->name('user.follow');
// ユーザーフォロー解除処理
Route::delete('/user/{name}/follow', 'UserController@unfollow')->name('user.unfollow');
