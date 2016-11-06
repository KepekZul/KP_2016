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
    public function tambahjadwaldosen(){
        return view('tambahjadwaldosen');
    }
    public function listjadwaldosen(){
        return view('listjadwaldosen');
    }
    public function editjadwaldosen(){
        return view('editjadwaldosen');
    }
}
