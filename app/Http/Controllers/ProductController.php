<?php

namespace App\Http\Controllers;

use App\Events\OrderCreated;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::all();
        $new = Product::orderBy('created_at', 'desc')->get();
        return view('product', ['products' => $product, 'new' => $new]);
    }
    public function addItem()
    {
        if (!Gate::allows('isAdmin')) {
            abort(404);
        }
        return view('additem');
    }
    public function detail($id)
    {
        $datas = Product::find($id);
        // return $datas;
        return view('detail', ['details' => $datas]);
    }
    public function addtoCart(Request $req)
    {
        $cart = Cart::where('carts.user_id', auth()->user()->id)
            ->where('product_id', '=', $req->product_id)->first();
        if ($cart) {
            $cart->quantity += $req->quantity;
            $cart->save();
            return redirect('/');
        } else {
            $cart = new Cart;
            $cart->user_id = auth()->user()->id;
            $cart->product_id = $req->product_id;
            $cart->quantity = $req->quantity;
            $cart->save();

            $cart->products()->attach($req->product_id);
            return redirect('/');
        }
    }
    public static function cartItem()
    {
        return Cart::where('user_id', auth()->user()->id)->count();
    }
    public function cartList()
    {
        $cart = Cart::with(['products'])
            ->where('carts.user_id', auth()->user()->id)
            ->get();
        $sum = 0;
        $quantity = 0;

        foreach ($cart as $user) {
            $quantity = $quantity + $user->quantity;
            $sum = $sum + $user->products[0]->price * $user->quantity;
        }
        return view('cartlist', ['carts' => $cart, 'sum' => $sum, 'quantity' => $quantity]);
    }
    public function removeItem($id)
    {
        Cart::destroy($id);
        return redirect('/cart-list');
    }
    public function search(Request $req)
    {
        $data = Product::
            where('name', 'like', '%' . $req->input('query') . '%')->orderBy('price', 'asc')->get();
        return view('search', ['products' => $data]);
    }
    public function cancelled($id)
    {
        $order = Order::find($id);
        $order->status = 'cancelled';
        $order->save();
        return redirect('/myorder');
    }
    public function filter(Request $req)
    {
        if ($req->price == 'High to low') {
            $product = Product::where('category', '=', $req->category)->orderBy('price', 'desc')->get();
            return view('category', ['products' => $product]);
        } else {
            $product = Product::where('category', '=', $req->category)->orderBy('price', 'asc')->get();
            return view('category', ['products' => $product]);
        }
    }

}
