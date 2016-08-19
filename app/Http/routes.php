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
Route::get('/login/dosen', 'loginController@dosen');
Route::get('/login/admin', 'loginController@admin');
Route::post('/login/loga', 'loginController@log1');
Route::post('/login/logd', 'loginController@log2');
Route::get('logout', 'loginController@logout');

//Admin
Route::get('/admin', function(){return redirect('admin/index');});
Route::get('/admin/index', 'adminController@index')->middleware('admin');
Route::get('/admin/accruangan', 'adminController@accRuangan')->middleware('admin');
Route::get('/admin/agenda', 'adminController@agenda')->middleware('admin');
Route::post('/admin/isiAgenda', 'adminController@isiAgenda')->middleware('admin');
Route::post('/admin/lihat', 'adminController@lihat')->middleware('admin');
Route::post('/admin/acc', 'adminController@acc')->middleware('admin');
Route::post('/admin/tolak', 'adminController@del')->middleware('admin');
Route::get('/admin/listagenda','adminController@listagenda')->middleware('admin');
Route::get('/admin/editagenda/{time}','adminController@editagenda')->middleware('admin');
Route::get('/admin/hapusagenda/{time}','adminController@hapus')->middleware('admin');
Route::post('/admin/ubah/{time}','adminController@ubah')->middleware('admin');
Route::get('/admin/tambahdosen','adminController@tambahdosen')->middleware('admin');
Route::post('/admin/add', 'adminController@add')->middleware('admin');
Route::get('/admin/setelan', 'adminController@setting')->middleware('admin');
Route::get('/admin/editpeminjaman', 'adminController@editpeminjaman')->middleware('admin');
Route::get('/admin/suntingpeminjaman/{kodepeminjaman}', 'adminController@halamaneditpinjam')->middleware('admin');
Route::post('/admin/updatepeminjaman', 'adminController@updatepeminjaman')->middleware('admin');
Route::post('/admin/hapus', 'adminController@hapuspeminjaman')->middleware('admin');
Route::post('/admin/tambahruang', 'adminController@tambahruang')->middleware('admin');
Route::post('/admin/tambahinterval', 'adminController@tambahinterval')->middleware('admin');

//Dosen
Route::get('/dosen', function(){return redirect('dosen/index');});
Route::get('/dosen/index', 'dosenController@index')->middleware('dosen');
Route::get('/dosen/status', 'dosenController@getStatus')->middleware('dosen');
Route::post('/dosen/post', 'dosenController@post')->middleware('dosen');

//umum
Route::get('/index', 'umumController@index');
Route::get('/agenda', 'umumController@agenda');
Route::get('/reservasi', 'umumController@reservasi');
Route::get('/reservasi/{ruangan}/{tanggal}', 'umumController@cekRuangan');
Route::get('/lihatdosen', 'umumController@dosen');
Route::get('/pinjam', 'umumController@pinjam');
Route::post('/isiPinjam', 'umumController@isiPinjam');
Route::get('/lihatdosen/data/{kunci}', 'umumController@data');
Route::get('/feeder', 'umumController@feeder');