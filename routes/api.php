<?php

Route::group(['middleware' => 'cors'], function () {
    Route::group(['prefix' => 'auth'], function () {
        Route::post('/login', 'AuthController@login');
        Route::post('/signup', 'AuthController@signup');
        Route::group(['middleware' => 'jwt.auth'], function () {
            Route::post('/logout', 'AuthController@logout');
            Route::post('/refresh', 'AuthController@refresh');
        });
    });
});