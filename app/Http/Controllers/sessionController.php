<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;

class sessionController extends Controller
{
    function session(){
        $cart = Cart::with(['product'])->get();
        return $cart;
    }
}
