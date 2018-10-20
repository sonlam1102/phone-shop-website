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

    Route::group(['prefix' => 'category'], function () {
        Route::get('/', 'CategoryController@index');
        Route::post('/', 'CategoryController@add');
        Route::put('/{id}/update', 'CategoryController@update')->where('id', '[0-9]+');
        Route::delete('/{id}/delete', 'CategoryController@delete')->where('id', '[0-9]+');
    });

    Route::group(['prefix' => 'city'], function(){
        Route::get('/', 'CityController@index');
        Route::post('/', 'CityController@add');
        Route::put('/{id}/update', 'CityController@update')->where('id', '[0-9]+');
    });

});

