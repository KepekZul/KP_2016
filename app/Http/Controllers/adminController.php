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
}