<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

class loginController extends Controller
{
    public function index(){
    	return view('login');
    }
    public function admin(request $request){
    	$berhasil= DB::select('call loginAdmin(?,?)',array($request['id'], $request['pass']));
    	if($berhasil[0]->pesan==1){
    		echo 'berhasil';
            $request->session()->put('username_admin',$request['id']);
            $idsession = $request->session()->get('username_admin');
            echo $idsession;
            echo 'kakakka';
    	}else{
    		echo 'gagal';
    	}
    }
    public function dosen(request $request){
    	
    }
}