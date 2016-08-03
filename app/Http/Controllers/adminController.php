<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

class adminController extends Controller
{
    public function index(){
    	return view('indexadmin');
    }
    public function accRuangan(){
    	$listPermohonan = DB::select('select * from daftar_permohonan where status_permohonan = ?', ['Diproses']);
    	return view('accruangan', ['listPermohonan'=>$listPermohonan]);
    }
    public function agenda(Request $Request){
    	return view('postagenda');
    }
    public function isiAgenda(Request $Request){
    	$isi = $Request['isi'];
    	$admin = $Request->session()->get('username_admin');
    	$mulai = $Request['mulai'];
    	$selesai = $Request['selesai'];
    	DB::select('call isiAgenda(?,?,?,?)', array($isi, $mulai, $admin, $selesai));
    	return view('postagenda');
    }
    public function acc(Request $request){
        $pesan = DB::select('call setujuiPermohonan(?,?)', array($request['kode_permohonan'], $request->session()->get('username_admin')));
        if($pesan[0]->status==1)
        return redirect()->back();
        else{
            $request->session()->flash('status', $pesan[0]->pesan);
            return redirect()->back();
        }
    }
    public function del(request $request){
        $pesan = DB::select('call tolakPermohonan(?,?)', array($request->session()->get('username_admin'), $request['kode_permohonan']));
        return redirect()->back();
    }
    public function listagenda(Request $request){
        return view('listagenda');
    }
    public function editagenda(Request $request){
        return view('editagenda');
    }
    public function tambahdosen(Request $request){
        return view('tambahdosen');
    }
}
