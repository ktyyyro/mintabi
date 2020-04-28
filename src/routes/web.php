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

Route::get('/user/{login_id}/following', 'UserController@followingList')->name('user.following');
Route::get('/user/{login_id}/followers', 'UserController@followersList')->name('user.followers');

// ユーザーフォロー処理
Route::put('/user/{login_id}/follow', 'UserController@follow')->name('user.follow');
// ユーザーフォロー解除処理
Route::delete('/user/{login_id}/follow', 'UserController@unfollow')->name('user.unfollow');
