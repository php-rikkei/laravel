<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\User;

class LoController extends Controller
{
    //
    public function getLogin(){
    	return view('Login');
    }
    
    public function postLogin(Request $request){
    	$this->validate($request,[	
    		'uname'=>'required',
    		'psw'=>'required|min:3|max:32'
    		],
    		[
    		'uname.required'=>'Ban Chua Nhap UserName',
    		'psw.required'=>'Ban Chua Nhap Password',
    		'psw.min'=>'Password Phai 3 Ki Tu Tro Len',
    		'psw.max'=>'Password Khong Vuot Qua 32 Ki Tu'
    		]);

    	if (Auth::attempt(['name'=>$request->uname,'password'=>$request->psw])){
    		echo "Dang Nhap Thanh Cong";
    	}
    	else {
            return view('Register');
        }

    }
}
