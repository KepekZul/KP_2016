<?php

namespace App\Http\Controllers;

use Session;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

class dosenController extends Controller
{
    public function index(){
    	return view('indexDosen');
    }
    public function getStatus(Request $request){
    	$status = DB::select('select status_dosen from daftar_status where nidn_daftar=? limit 5', array($request->session()->get('nidn_dosen')));
    	return view('poststatus', ['status'=>$status]);
    }
    public function post(Request $request){
    	DB::select('call updateStatus(?,?,?)', array($request->session()->get('nidn_dosen'),$request['status_baru'],$request['isi']));
        return redirect()->back();
    }
    public function gantipassword(){
        return view('gantipassword');
    }
    public function gantipass(Request $request){
        $pesan=DB::select('call gantiPasswordDosen(?,?,?)', array($request['passlama'], $request['passbaru1'], $request->session()->get('nidn_dosen')));
        session::flash('hasil', $pesan[0]->message);
        return redirect()->back();
    }
    public function isiRutin(Request $request)
    {
        DB::select('insert into kegiatan_rutin(nidn_dosen, hari_rutin, kegiatan_rutin, waktu_rutin) values(?,?,?,?)', array($request->session()->get('nidn_dosen'), $request['hari'], $request['kegiatan'], $request['jam']));
        return redirect()->back();
    }
    public function tambahjadwaldosen(){
        return view('tambahjadwaldosen');
    }
    public function listjadwaldosen(Request $request){
        $hasil=DB::select('select * from kegiatan_rutin where NIDN_dosen = ?;', array($request->session()->get('nidn_dosen')));
        return view('listjadwaldosen', ['hasil'=>$hasil]);
    }
    public function editjadwaldosen($id, Request $request){
        $hasil=DB::select('select * from kegiatan_rutin where NIDN_dosen =? and id_rutin=?', array($request->session()->get('nidn_dosen'), $id));
        return view('editjadwaldosen', ['hasil'=>$hasil]);
    }
    public function editRutin(Request $request)
    {
        DB::select('update kegiatan_rutin set kegiatan_rutin = ?, waktu_rutin=?, hari_rutin=? where id_rutin =?', array($request['kegiatan'], $request['waktu'], $request['hari'], $request['id']));
        return redirect('/dosen');
    }
    public function hapusRutin($id)
    {
        DB::select('delete from kegiatan_rutin where id_rutin =?', array($id));
        return redirect()->back();
    }
}
