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
    	return view('accruangan');
    }
    public function agenda(Request $Request){
    	echo $Request->session->get('username_admin');
    	return view('postagenda');
    }
    public function isiAgenda(Request $Request){
    	echo $Request->session->get('username_admin');
    	$isi = $Request['isi'];
    	$mulai = $Request['mulai'];
    	$selesai = $Request['selesai'];
    	//$pesan = DB::select('call isiAgenda(?,?,?,?)', $isi, $mulai, $Request->session->get('username_admin'), $selesai);
    	//return view('postagenda');
    }
}
