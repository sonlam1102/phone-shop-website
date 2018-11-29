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

Route::group(['prefix' => 'customer', 'middleware' => ['auth', 'customer', ]], function () {

    Route::group(['prefix' => 'cart'], function () {
        Route::post('/product/{id}/add', 'CartController@add_cart')->where('id', '[0-9]+');
        Route::put('/product/update', 'CartController@update_product_cart');
        Route::delete('/product/{id}/delete', 'CartController@delete_cart')->where('id', '[0-9]+');
    });

    Route::group(['prefix' => 'order'], function () {
        Route::post('/create', 'OrderController@make_order');
        Route::put('/{id}/cancel', 'OrderController@cancel')->where('id', '[0-9]+');
        Route::get('/{id}/info', 'OrderController@receipt')->where('id', '[0-9]+');
        Route::put('/{id}/cancel', 'OrderController@cancel')->where('id', '[0-9]+');
    });

    Route::group(['prefix' => 'warranty'], function () {
        Route::post('/request', 'WarrantyController@warranty_request');
        Route::put('/request/{id}/cancel', 'WarrantyController@cancel')->where('id', '[0-9]+');
    });
});