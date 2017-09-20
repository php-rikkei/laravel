<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Wallet extends Model {

    protected $table = 'wallets';
    protected $fillable = [
        'name_wallet', 'money_wallet', 'id_user'
    ];
    public $timestamps = false;
    
    public static function getAllWalletTransfer() {
        $id = Auth::user()->id;
        $wallet = Wallet::where('id_user', $id)->get();
        return $wallet;
    }
    public static function getAllWallet() {
        $id = Auth::user()->id;
        $wallet = Wallet::where('id_user', $id)->paginate(4);
        return $wallet;
    }

    public static function insertWallet($data) {
        $wallet = new Wallet;
        $wallet->name_wallet = $data['name_wallet'];
        $wallet->money_wallet = $data['money_wallet'];
        $wallet->id_user=$data['id_user'];
        $wallet->save();
        return $wallet;
    }

    public static function updateWallet($data) {
        $wallet = Wallet::findOrFail($data['id']);
        $wallet->name_wallet = $data['name_wallet'];
        $wallet->money_wallet = $data['money_wallet'];
        $wallet->save();
        return $wallet;
    }

    public static function deleteWallet($id) {
        $wallet = Wallet::findOrFail($id);
        $wallet->delete();
        return 0;
    }
    
    public static function getWalletByID($id){
        $wallet = Wallet::where('id', $id)->get();
        return $wallet;
    }
    
    public static function mappingKey($data){
        $row = \DB::table('wallets')->where('name_wallet', 'like', '%' . $data['request'] . '%')->get();
        return $row;
    }

}
