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
        Route::get('/', 'ProductController@list');
        Route::post('/create', 'ProductController@add');
        Route::put('/{id}/update', 'ProductController@update')->where('id', '[0-9]+');
        Route::delete('/{id}/delete', 'ProductController@delete')->where('id', '[0-9]+');
        Route::get('/{id}/list', 'ProductController@list_products')->where('id', '[0-9]+');
        Route::get('/category/{id}/form', 'ProductController@list_attribute_form')->where('id', '[0-9]+');
    });

    Route::group(['prefix' => 'order'], function() {
        Route::get('/', 'OrderController@index');
        Route::get('/{id}/review', 'OrderController@confirmOrder')->where('id', '[0-9]+');
        Route::get('/{id}/check', 'OrderController@review')->where('id', '[0-9]+');
        Route::post('/{id}/confirm', 'OrderController@confirm')->where('id', '[0-9]+');
    });

    Route::group(['prefix' => 'staff'], function() {
        Route::get('/', 'StaffController@index');
        Route::post('/create', 'StaffController@add');
        Route::put('/{id}/reset', 'StaffController@reset')->where('id', '[0-9]+');
    });

    Route::group(['prefix' => 'import'], function() {
        Route::get('/', 'ImportController@index');
        Route::get('/{id}/detail', 'ImportController@detail')->where('id', '[0-9]+');
    });

    Route::group(['prefix' => 'export'], function() {
        Route::get('/', 'ExportController@index');
        Route::get('/{id}/info', 'ExportController@show')->where('id', '[0-9]+');
        Route::post('/create', 'ExportController@add');
    });

    Route::group(['prefix' => 'gift'], function() {
        Route::get('/', 'GiftController@index');
        Route::get('/{id}/accessories', 'GiftController@list_accessories')->where('id', '[0-9]+');
        Route::post('/create', 'GiftController@add');
        Route::put('/{id}/update', 'GiftController@update')->where('id', '[0-9]+');
    });

    Route::group(['prefix' => 'customer'], function() {
        Route::get('/', 'CustomerController@index');
        Route::put('/{id}/change', 'CustomerController@change')->where('id', '[0-9]+');
    });
});
