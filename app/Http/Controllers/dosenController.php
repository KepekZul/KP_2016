<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

class dosenController extends Controller
{
    public function index(){
    	return view('indexDosen');
    }
    public function getStatus(Request $request){
    	$status = DB::select('select status from daftar_status where nidn_daftar=?', array($request->session()->get('nidn_dosen')));
    	return view('poststatus', ['status'=>$status]);
    }
}
