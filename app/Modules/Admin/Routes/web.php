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
        Route::delete('/{id}/delete', 'CityController@delete')->where('id', '[0-9]+');
    });

    Route::group(['prefix' => 'attribute'], function () {
        Route::get('/', 'AttributeController@index');
        Route::post('/', 'AttributeController@add');
        Route::put('/{id}/update', 'AttributeController@update')->where('id', '[0-9]+');
        Route::delete('/{id}/delete', 'AttributeController@delete')->where('id', '[0-9]+');
    });

    Route::group(['prefix' => 'manager'], function () {
        Route::get('/', 'ManagerController@index');
        Route::put('/{id}/reset', 'ManagerController@reset')->where('id', '[0-9]+');
        Route::put('/{id}/update', 'ManagerController@update')->where('id', '[0-9]+');
        Route::post('/', 'ManagerController@add');
    });

    Route::group(['prefix' => 'company'], function () {
        Route::get('/', 'CompanyController@index');
        Route::post('/', 'CompanyController@add');
        Route::put('/{id}/update', 'CompanyController@update')->where('id', '[0-9]+');
    });

    Route::group(['prefix' => 'brand'], function () {
        Route::get('/', 'BrandController@index');
        Route::post('/', 'BrandController@add');
        Route::put('/{id}/update', 'BrandController@update')->where('id', '[0-9]+');
        Route::delete('/{id}/delete', 'BrandController@delete')->where('id', '[0-9]+');
    });

});

