<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

class loginController extends Controller
{
    public function index(){
    	return view('formlogin');
    }
    public function admin(request $request){
    	$berhasil= DB::select('call loginAdmin(?,?)',array($request['id'], $request['pass']));
    	if($berhasil[0]->pesan==1){
            $request->session()->put('username_admin',$request['id']);
            return redirect('admin/index');
    	}else{
    		echo 'gagal';
    	}
    }
    public function dosen(request $request){
    	
    }
}