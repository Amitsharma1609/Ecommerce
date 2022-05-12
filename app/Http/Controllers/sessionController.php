<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Order;

class sessionController extends Controller
{
    function session(){
        return auth()->user()->email;
    }
    public function catergory(){

    }
}
