<?php

Route::group([

    'prefix' => '',
    'namespace' => 'App\Http\Controllers',
    'middleware' => 'web',

], function() {
    Route::auth();
    Route::get('/', function () {
        return view('Auth::welcome');
    });
});
//Route::auth();
//Route::get('/', function () {
//    return view('Auth::welcome');
//});
