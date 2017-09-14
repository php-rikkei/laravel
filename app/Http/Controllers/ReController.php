<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;

class ReController extends Controller
{
    public function getRegister(){
    	return view('Register');
    }

    public function postRegister(Request $request){
    	$this->validate($request,[
    		'name'=> 'required',
    		'email'=> 'required',
    		'psw'=> 'required|min:5|max:15'
    		],
    		[
    		'name.required'=>'Ban chua nhap Ten!!!!',
    		'email.required'=>'Ban chua nhap Email!!!!',
    		'psw.required'=>'Ban chua nhap ten!!!!',
    		'email.unique'=>'Ban nhap khong phai Email!!!!',
    		'psw.min'=>'Ban nhap password phai hon 5 ki tu!!!!',
    		'psw.max'=>'Ban nhap password nho hon 15 ki tu!!!!'
    		]);
    	$admin = new Admin;
    	$admin->name = $request->input('name');
    	$admin->email = $request->input('email');
    	$admin->password = $request->input('psw');
    	$admin->save();
    	return redirect('/getRegister')->with('response','Dang Ki Thanh Cong');
    }
}
