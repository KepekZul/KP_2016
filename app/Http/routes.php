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
    return view('index');
});
//Login
Route::get('login/dosen', 'loginController@dosen');
Route::get('login/admin', 'loginController@admin');
Route::post('login/loga', 'loginController@log1');
Route::post('login/logd', 'loginController@log2');
Route::get('logout', 'loginController@logout');

//Admin
Route::get('admin/index', 'adminController@index');
Route::get('admin/accruangan', 'adminController@accRuangan');
Route::get('admin/agenda', 'adminController@agenda');
Route::post('admin/isiAgenda', 'adminController@isiAgenda');
Route::post('admin/lihat', 'adminController@lihat');
Route::post('admin/acc', 'adminController@acc');
Route::post('admin/tolak', 'adminController@del');
Route::get('admin/listagenda','adminController@listagenda');
Route::get('admin/editagenda/{time}','adminController@editagenda');
Route::get('admin/hapusagenda/{time}','adminController@hapus');
Route::post('admin/ubah/{time}','adminController@ubah');
Route::get('admin/tambahdosen','adminController@tambahdosen');
Route::post('admin/add', 'adminController@add');

//Dosen
Route::get('dosen/index', 'dosenController@index');
Route::get('dosen/status', 'dosenController@getStatus');
Route::post('dosen/post', 'dosenController@post');

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
Route::get('/logindosen','FormLoginDosenController@showFormLoginDosen');