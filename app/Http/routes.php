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

Route::get('/dumb', 'dummyController@fetch');
Route::get('login', 'loginController@index');
Route::post('login/admin', 'loginController@admin');

Route::get('/accruangan','AccruanganController@showAccruangan');
Route::get('/agenda','AgendaController@showAgenda');
Route::get('/detaildosen','DetailDosenController@showDetailDosen');
Route::get('/formlogin','FormLoginController@showFormLogin');
Route::get('/formpinjam','FormPinjamController@showFormPinjam');
Route::get('/indexadmin','IndexAdminController@showIndexAdmin');
Route::get('/index','IndexController@showIndex');
Route::get('/indexdosen','IndexDosenController@showIndexDosen');
Route::get('/jadwal','JadwalController@showJadwal');
Route::get('/lihatdosen','LihatDosenController@showLihatDosen');
Route::get('/postagenda','PostAgendaController@showPostAgenda');
Route::get('/poststatus','PostStatusController@showPostStatus');
