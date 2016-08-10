<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

class umumController extends Controller
{
    public function index(){
    	return view('index');
    }
    public function agenda(){
    	return view('agenda');
    }
    public function reservasi(){
    	return view('jadwal');
    }
    public function dosen(){
        $listDosen = DB::select('select nama_dosen from dosen');
    	return view('lihatdosen', ['listDosen'=>$listDosen]);
    }
    public function pinjam(){
    	$ruangan=DB::select('select * from ruangan');
    	$rutinitas=DB::select('select * from rutinitas');
    	return view('formpinjam', ['ruangan'=>$ruangan,'rutinitas'=>$rutinitas]);
    }
    public function isiPinjam(Request $request){
    	DB::select('call isiPemohon(?,?,?)', array($request['nama'], $request['telp'], $request['email']));
        $pengisian = DB::select('call isiPermohonan(?,?,?, ?,?,?, ?,?,?)', array($request['nama'],$request['keg'], $request['tglmulai'], $request['wktmulai'], $request['wktselesai'], $request['badan'], $request['ruang'], $request['rutin'], $request['kali']));
        if($pengisian[0]->pesan==1){
            return '1';
        }else{
            return '0';
        }
    }
    function data($kunci){
        $data = DB::select('call getListDosen(?)', array($kunci));
        return response()->json(['dataDosen'=>$data]);
    }
}