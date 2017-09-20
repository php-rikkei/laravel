<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getEditUser($id){
        $rows = \DB::table('users')->where('id', $id)->get();
        return view('User.Edit',['rows'=>$rows]);
    }
    public function postEditUser($id,Request $request){
        \DB::table('users')
                ->where('id', $id)
                ->update(['name' => $request->input('name'), 'email' => $request->input('email')]);
        return redirect('/getManageWallet')->with([
                    'flash_message' => \Message::UPDATE_SUCCESS
        ]);
    }
}
