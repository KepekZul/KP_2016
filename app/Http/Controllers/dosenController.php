<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class dosenController extends Controller
{
    public function index(){
    	return view('indexDosen');
    }
    public function postStatus(){
    	return view('poststatus');
    }
}
