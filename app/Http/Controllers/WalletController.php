<?php
use Illuminate\Support\Facades\Auth;
namespace App\Http\Controllers;
use App\Wallet;
use Auth;
use Illuminate\Http\Request;

class WalletController extends Controller
{
	/*public function getId(){
  	return $this->id;
	}*/
	
    
    public function getManageWallet(){
    	 $id = Auth::user()->id;
    	 $wallet = \DB::table('wallets')->where('id_user',$id)->get();
						 
    	return view('ManageWallet',['wallet'=>$wallet]);
    }
    
    public function getAddWallet(){
    	return view('Wallet.Add');
    }
    
    public function postAddWallet(Request $request){
    	$wallet = new Wallet;
    	$wallet->name_wallet = $request->input('nameWallet');
    	$wallet->money_wallet = $request->input('priceWallet');
    	$id = Auth::user()->id;
    	$wallet->id_user = $id;
    	$wallet->save();
    	return redirect('/getManageWallet'); 
    }
    
    public function getEditWallet($id){
       $rows = \DB::table('wallets')->where('id',$id)->get();
       return view('Wallet.Edit',['rows'=>$rows]);
       //print_r($rows);
    }
   
    public function postEditWallet($id,Request $request){
        \DB::table('wallets')
                        ->where('id',$id)
                        ->update(['name_wallet'=>$request->input('nameWallet'),'money_wallet'=>$request->input('priceWallet')]);
        return redirect('/getManageWallet'); 
    }
   
    public function postDeleteWallet($id){
        /*\DB::table('wallets')->where('id',$id)->delete();
        return redirect('/getManageWallet')->with('response','Bạn vừa xóa 1 Wallet'); */
        $delete = Wallet::findOrFail($id);
        $delete->delete();
        return redirect('/getManageWallet');
    }
}
