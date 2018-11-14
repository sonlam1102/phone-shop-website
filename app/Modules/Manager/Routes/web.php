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

Route::group(['prefix' => 'manager', 'middleware' => ['auth', 'manager', ]], function () {
    Route::get('/', 'ManagerController@index')->name('index');

    Route::group(['prefix' => 'product'], function() {
        Route::get('/', 'ProductController@index');
        Route::post('/create', 'ProductController@add');
        Route::put('/{id}/update', 'ProductController@update')->where('id', '[0-9]+');
        Route::delete('/{id}/delete', 'ProductController@delete')->where('id', '[0-9]+');
    });

    Route::group(['prefix' => 'order'], function() {
        Route::get('/', 'OrderController@index');
        Route::put('/{id}/confirm', 'OrderController@checkOrder')->where('id', '[0-9]+');
    });

    Route::group(['prefix' => 'staff'], function() {
        Route::get('/', 'StaffController@index');
        Route::post('/create', 'StaffController@add');
        Route::put('/{id}/reset', 'StaffController@reset')->where('id', '[0-9]+');
    });
});
