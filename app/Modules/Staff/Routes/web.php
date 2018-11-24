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

Route::group(['prefix' => 'staff', 'middleware' => ['auth', 'staff', ]], function () {
    Route::get('/', 'StaffController@index')->name('index');

    Route::group(['prefix' => 'product'], function() {
        Route::get('/', 'ProductController@index');
        Route::get('/{id}/list', 'ProductController@list_products')->where('id', '[0-9]+');
        Route::post('/import', 'ProductController@import');
        Route::post('/{id}/import', 'ProductController@product_import')->where('id', '[0-9]+');
    });

    Route::group(['prefix' => 'order'], function() {
        Route::get('/', 'OrderController@index');
        Route::get('/{id}/review', 'OrderController@confirmOrder')->where('id', '[0-9]+');
        Route::get('/{id}/check', 'OrderController@review')->where('id', '[0-9]+');
        Route::post('/{id}/confirm', 'OrderController@confirm')->where('id', '[0-9]+');
    });
});
