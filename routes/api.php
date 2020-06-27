<?php

Route::group(['middleware' => 'cors'], function () {
    Route::get('/dashboard', 'HomeController@index');
    Route::get('/settings', 'SettingController@index');
    Route::group(['prefix' => 'orders'], function () {
        Route::post('/', 'OrderController@store');
        Route::group(['middleware' => 'jwt.auth'], function () {
            Route::get('/', 'OrderController@index');
            Route::get('/{id}', 'OrderController@show');
        });
    });
    Route::group(['prefix' => 'auth'], function () {
        Route::post('/login', 'AuthController@login');
        Route::post('/signup', 'AuthController@signup');
        Route::group(['middleware' => 'jwt.auth'], function () {
            Route::post('/logout', 'AuthController@logout');
            Route::post('/refresh', 'AuthController@refresh');
        });
    });
});