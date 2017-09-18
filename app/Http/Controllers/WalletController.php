<?php

use Illuminate\Support\Facades\Auth;

namespace App\Http\Controllers;

use App\Wallet;
use Auth;
use Illuminate\Http\Request;

class WalletController extends Controller {
    /* public function getId(){
      return $this->id;
      } */

    public function getManageWallet() {
        $id = Auth::user()->id;
        $wallet = \DB::table('wallets')->where('id_user', $id)->paginate(4);
        return view('ManageWallet', ['wallet' => $wallet]);
    }

    public function getAddWallet() {
        return view('Wallet.Add');
    }

    public function postAddWallet(Request $request) {
        $wallet = new Wallet;
        $wallet->name_wallet = $request->input('nameWallet');
        $wallet->money_wallet = $request->input('priceWallet');
        $id = Auth::user()->id;
        $wallet->id_user = $id;
        $wallet->save();
        return redirect('/getManageWallet');
    }

    public function getEditWallet($id) {
        $rows = \DB::table('wallets')->where('id', $id)->get();
        return view('Wallet.Edit', ['rows' => $rows]);
    }

    public function postEditWallet($id, Request $request) {
        \DB::table('wallets')
                ->where('id', $id)
                ->update(['name_wallet' => $request->input('nameWallet'), 'money_wallet' => $request->input('priceWallet')]);
        return redirect('/getManageWallet');
    }

    public function postDeleteWallet($id) {
        $delete = Wallet::findOrFail($id);
        $delete->delete();
        return redirect('/getManageWallet');
    }

    public function getTransferWallet() {
        $wallet = \DB::table('wallets')->get();
        return view('Wallet.Transfer', ['wallet' => $wallet]);
    }

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
        return redirect('/getManageWallet');
    }

    public function getSearchAuto(Request $request) {
        $row = \DB::table('wallets')->select('id', 'name_wallet')->where('name_wallet', 'like', '%' . $request->key . '%')->get();
        return json_encode($row);
    }

}
