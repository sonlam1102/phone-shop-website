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
        Route::get('/', 'ProductController@list');
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

    Route::group(['prefix' => 'warranty'], function() {
        Route::get('/', 'WarrantyController@index');
        Route::put('/request/{id}/confirm', 'WarrantyController@confirm')->where('id', '[0-9]+');
    });

    Route::group(['prefix' => 'customer'], function() {
        Route::get('/', 'CustomerController@index');
        Route::put('/{id}/change', 'CustomerController@change')->where('id', '[0-9]+');
    });

    Route::group(['prefix' => 'message'], function() {
        Route::get('/', 'MessageController@index');
        Route::post('/push', 'MessageController@push');
        Route::get('/{id}/message', 'MessageController@get_messages')->where('id', '[0-9]+');
    });
});
