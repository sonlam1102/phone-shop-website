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

Route::get('/welcome', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', 'HomeController@main')->name('home')->middleware('user_type');
Route::get('/product/{id}/info', 'HomeController@info')->where('id', '[0-9]+');
Route::post('/update_info', 'UserinfoController@update')->name('update_info')->middleware('auth');