<?php

namespace App\Http\Controllers;

use App\Events\OrderCreated;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::all();
        return view('product', ['products' => $product]);
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
        return view('detail', ['details' => $datas]);
    }
    public function addtocart(Request $req)
    {

        $cart = new Cart;
        $cart->user_id = auth()->user()->id;
        $cart->product_id = $req->product_id;
        $cart->save();
        return redirect('/');
    }
    public static function cartItem()
    {
        //return "hello";
        return Cart::where('user_id', auth()->user()->id)->count();
    }
    public function cartList()
    {
        $products = DB::table('carts')
            ->join('products', 'carts.product_id', '=', 'products.id')
            ->where('carts.user_id', auth()->user()->id)
            ->select('products.*', 'carts.id as cart_id')
            ->get();
        return view('cartlist', ['data' => $products]);
    }
    public function removeitem($id)
    {
        Cart::destroy($id);
        return redirect('/cart-list');
    }
    public function search(Request $req)
    {
        $data = Product::
            where('name', 'like', '%' . $req->input('query') . '%')
            ->get();

        return view('search', ['products' => $data]);
    }
    public function myOrder()
    {
        $users = DB::table('orders')
            ->join('products', 'orders.product_id', '=', 'products.id')
            ->where('orders.user_id', auth()->user()->id)
            ->select('products.*', 'orders.*', 'orders.id as order_id')
            ->get();

        return view('myorder', compact('users'));
    }
    public function orderNow()
    {

        $products = DB::table('carts')
            ->join('products', 'carts.product_id', '=', 'products.id')
            ->where('carts.user_id', auth()->user()->id)
            ->select('products.*', 'carts.id as cart_id')
            ->sum('products.price');

        $users = DB::table('carts')
            ->join('products', 'carts.product_id', '=', 'products.id')
            ->where('carts.user_id', auth()->user()->id)
            ->select('products.*', 'carts.id as cart_id')
            ->get();

        return view('ordernow', ['product' => $products, 'user' => $users]);

    }
    public function orderplace(Request $req)
    {

        $products = DB::table('carts')
            ->join('products', 'carts.product_id', '=', 'products.id')
            ->where('carts.user_id', auth()->user()->id)
            ->select('products.*', 'carts.id as cart_id')
            ->sum('products.price');

        $users = DB::table('carts')
            ->join('products', 'carts.product_id', '=', 'products.id')
            ->where('carts.user_id', auth()->user()->id)
            ->select('products.*', 'carts.id as cart_id')
            ->get();

        $carts = Cart::where('user_id', auth()->user()->id)->get();

        foreach ($carts as $cart) {
            $order = new Order;
            $order->product_id = $cart['product_id'];
            $order->user_id = $cart['user_id'];
            $order->payment_method = 'credit card';
            $order->payment_status = 'pending';
            $order->address = $req->address;
            $order->save();
        }
        event(new OrderCreated($products, $users));
        return redirect('/');
    }
    public function addItems(Request $req)
    {

        $product = new Product;
        $product->name = $req->name;
        $product->price = $req->price;
        $product->category = $req->category;
        $product->description = $req->description;

        $fileName = time() . '.' . $req->file('gallery')->getClientOriginalExtension();
        $req->file('gallery')->move(public_path('/uploads'), $fileName);

        $product->gallery = $fileName;

        $product->save();
        return redirect('/');
    }
    public function manageitem()
    {
        $products = Product::all();
        return view('manageitem', ['product' => $products]);
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('edit', ['product' => $product]);
    }

    public function update(Request $req, $id)
    {
        $product = Product::find($id);
        $product->name = $req->name;
        $product->price = $req->price;
        $product->category = $req->category;
        $product->description = $req->description;
        $product->save();
        return redirect('manage-item')->with('flash_message', 'Product Updated!');
    }
    public function delete($id)
    {
        Product::destroy($id);
        return redirect('manage-item');
    }
    public function users()
    {
        $user = User::all();
        return view('user', ['users' => $user]);
    }
    public function deletes($id)
    {
        User::destroy($id);
        return redirect('users');
    }
    public function orders($id)
    {
        $datas = Product::find($id);
        return view('orders', ['details' => $datas]);
    }
}
