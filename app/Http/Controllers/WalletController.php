<?php

use Illuminate\Support\Facades\Auth;

namespace App\Http\Controllers;

use App\Wallet;
use Auth;
use Illuminate\Http\Request;

class WalletController extends Controller {

    /**
     * Display a listing of the wallet.
     *
     * @return \Illuminate\Http\Response
     */
    public function getManageWallet() {
        $wallet = Wallet::getAllWallet();
        return view('ManageWallet', ['wallet' => $wallet]);
    }

    /**
     * Show the form for creating a new wallet.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAddWallet() {
        return view('Wallet.Add');
    }

    /**
     * Store a newly created wallet.
     *
     * @param  \Illuminate\Http\UserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function postAddWallet(Request $request) {
        
        $data =['name_wallet'=>$request->nameWallet,
                'money_wallet'=>$request->priceWallet,
                'id_user'=> Auth::user()->id ];
        Wallet::insertWallet($data);
        return redirect('/getManageWallet')->with([
                    'flash_message' => \Message::INSERT_SUCCESS
        ]);
    }

    /**
     * Show the form for editing the specified wallet.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getEditWallet($id) {
        $rows = Wallet::getWalletByID($id);
        return view('Wallet.Edit', ['rows' => $rows]);
    }

    /**
     * Accessed the form for editing the specified wallet.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postEditWallet($id, Request $request) {
        $data=['name_wallet'=>$request->nameWallet,
               'money_wallet'=>$request->priceWallet,
                'id'=>$id];
        Wallet::updateWallet($data);
        return redirect('/getManageWallet')->with([
                    'flash_message' => \Message::UPDATE_SUCCESS
        ]);
    }

    /**
     * Accessed the delete action the specified wallet.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postDeleteWallet($id) {
        Wallet::deleteWallet($id);
        return redirect('/getManageWallet')->with([
                    'flash_message' => \Message::DELETE_SUCCESS
        ]);
    }

    /**
     * Show the form for transfer the specified wallet.
     *
     * @return \Illuminate\Http\Response
     */
    public function getTransferWallet() {
        $wallet = Wallet::getAllWalletTransfer();
        return view('Wallet.Transfer', ['wallet' => $wallet]);
    }

    /**
     * Accessed the transfer action wallet.
     *
     * @param  $request
     * @return \Illuminate\Http\Response
     */
    public function postTransferWallet(Request $request) {
        $id_send = $request->input('send');
        $id_to = $request->input('to');
        $money = $request->input('money-send');
        $wallet = \DB::table('wallets')->select('money_wallet')->where('id', $id_send)->get();
        foreach ($wallet as $row) {
            $money_send = $row->money_wallet - $money;
        }
        $wallet1 = \DB::table('wallets')->select('money_wallet')->where('id', $id_to)->get();
        foreach ($wallet1 as $rows) {
            $money_to = $rows->money_wallet + $money;
        }
        \DB::table('wallets')
                ->where('id', $id_send)
                ->update(['money_wallet' => $money_send]);
        \DB::table('wallets')
                ->where('id', $id_to)
                ->update(['money_wallet' => $money_to]);
        return redirect('/getManageWallet')->with([
                    'flash_message' => \Message::TRANSFER_SUCCESS
        ]);
    }

    /**
     * Accessed the return Json action wallet.
     *
     * @param  $request
     * @return Json 
     */
    public function getSearchAuto(Request $request) {
        $data=['request'=>$request->key];
        $row = Wallet::mappingKey($data);
        return json_encode($row);
    }
    
     /**
     * Accessed the return Json action wallet.
     *
     * @param  $request
     * @return Json 
     */
    public function getShowDetail($id){
        $wallet = Wallet::getWalletByID($id);
        return view('Wallet.Detail',['wallet'=>$wallet]);
    }
    /**
     * Accessed the comfirm search action wallet.
     *
     * @param  $request
     * @return \Illuminate\Http\Response
     */
    public function getSearch(Request $request){
        $data=['request'=>$request->search];
        $wallet = Wallet::mappingKey($data);
        return view('Wallet.Search',['wallet'=>$wallet]);
    }
}
