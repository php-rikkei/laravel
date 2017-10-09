<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RevenueController extends Controller
{
    public function getManageRevenue(){
        return view('Revenue.master');
    }
}
