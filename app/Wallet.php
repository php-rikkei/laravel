<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    protected $table = 'wallets';
    protected $fillable = [
        'name_wallet', 'money_wallet', 'id_user'
    ];
    public $timestamps = false;
}
