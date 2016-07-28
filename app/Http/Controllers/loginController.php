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
    	$berhasil= DB::select('call loginAdmin(?,?)',array($request['username'], $request['pass']));
    	if($berhasil[0]->pesan==1){
    		echo 'berhasil';
    	}else{
    		echo 'gagal';
    	}
    }
}