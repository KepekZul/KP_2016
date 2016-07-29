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
<<<<<<< HEAD

Route::get('/dumb', 'dummyController@fetch');
Route::get('login', 'loginController@index');
Route::get('login/admin', 'loginController@admin');
=======
>>>>>>> 52c4f7d648dfb8487fd8c1278747b385a8c77741
