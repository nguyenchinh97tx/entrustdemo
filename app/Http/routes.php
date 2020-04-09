<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::group(['middleware' => ['auth']], function() {

    Route::get('/home', 'HomeController@index');

    Route::get('users',['as'=>'users.index','uses'=>'UserController@index','middleware' => ['permission:user-list']]);
    Route::get('users/create',['as'=>'users.create','uses'=>'UserController@create','middleware' => ['permission:user-create']]);
    Route::post('users/create',['as'=>'users.store','uses'=>'UserController@store','middleware' => ['permission:user-create']]);
    Route::get('users/{id}',['as'=>'users.show','uses'=>'UserController@show','middleware' => ['permission:user-show']]);
    Route::get('users/{id}/edit',['as'=>'users.edit','uses'=>'UserController@edit','middleware' => ['permission:user-edit']]);
    Route::patch('users/{id}',['as'=>'users.update','uses'=>'UserController@update','middleware' => ['permission:user-edit']]);
    Route::delete('users/{id}',['as'=>'users.destroy','uses'=>'UserController@destroy','middleware' => ['permission:user-delete']]);


    Route::get('roles',['as'=>'roles.index','uses'=>'RoleController@index','middleware' => ['permission:role-list']]);
    Route::get('roles/create',['as'=>'roles.create','uses'=>'RoleController@create','middleware' => ['permission:role-create']]);
    Route::post('roles/create',['as'=>'roles.store','uses'=>'RoleController@store','middleware' => ['permission:role-create']]);
    Route::get('roles/{id}',['as'=>'roles.show','uses'=>'RoleController@show','middleware' => ['permission:role-show']]);
    Route::get('roles/{id}/edit',['as'=>'roles.edit','uses'=>'RoleController@edit','middleware' => ['permission:role-edit']]);
    Route::patch('roles/{id}',['as'=>'roles.update','uses'=>'RoleController@update','middleware' => ['permission:role-edit']]);
    Route::delete('roles/{id}',['as'=>'roles.destroy','uses'=>'RoleController@destroy','middleware' => ['permission:role-delete']]);


    Route::get('books',['as'=>'books.index','uses'=>'BookController@index','middleware' => ['permission:book-list']]);
    Route::get('books/create',['as'=>'books.create','uses'=>'BookController@create','middleware' => ['permission:book-create']]);
    Route::post('books/create',['as'=>'books.store','uses'=>'BookController@store','middleware' => ['permission:book-create']]);
    Route::get('books/{id}',['as'=>'books.show','uses'=>'BookController@show','middleware' => ['permission:book-show']]);
    Route::get('books/{id}/edit',['as'=>'books.edit','uses'=>'BookController@edit','middleware' => ['permission:book-edit']]);
    Route::patch('books/{id}',['as'=>'books.update','uses'=>'BookController@update','middleware' => ['permission:book-edit']]);
    Route::delete('books/{id}',['as'=>'books.destroy','uses'=>'BookController@destroy','middleware' => ['permission:book-delete']]);




});
