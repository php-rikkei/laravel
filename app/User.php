<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {

    protected $table = 'users';
    protected $fillable = [
        'email', 'name', 'password'
    ];
    public $timestamps = false;
    
    protected $hidden = ['password', 'remember_token'];
    

}
