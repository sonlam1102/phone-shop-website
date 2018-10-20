<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your module. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin', ]], function () {
    Route::get('/', 'AdminController@index')->name('index');

    Route::get('/category', 'CategoryController@index')->name('category');
    Route::post('/category', 'CategoryController@add')->name('add_category');
    Route::put('/category/{id}', 'CategoryController@update')->where('id', '[0-9]+')->name('update_category');
    Route::delete('/category/{id}/delete', 'CategoryController@delete')->where('id', '[0-9]+')->name('delete_category');

    Route::get('/city', 'CityController@index');
});

