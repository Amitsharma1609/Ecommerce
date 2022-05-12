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
        $cart->quantity = $req->quantity;
        $cart->save();

        $cart->products()->attach($req->product_id);
        return redirect('/');
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
        return view('cartlist', ['carts' => $cart]);
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
        $order = Order::with(['product'])->where('user_id', auth()->user()->id)->get();

        return view('myorder', ['data' => $order]);
    }
    public function orderNow()
    {
        $users = Cart::with(['products'])
            ->where('carts.user_id', auth()->user()->id)
            ->get();
        $sum = 0;
        foreach ($users as $user) {
            $sum = $sum + $user->products[0]->price * $user->quantity;
        }
        return view('ordernow', ['sum' => $sum, 'user' => $users]);
    }
    public function orderplace(Request $req)
    {
        $users = Cart::with(['products'])
            ->where('carts.user_id', auth()->user()->id)
            ->get();
            $sum = 0;
            foreach ($users as $user) {
                $sum = $sum + $user->products[0]->price * $user->quantity;
            }
            //return $users;
        $carts = Cart::where('user_id', auth()->user()->id)->get();
        $email = auth()->user()->email;
        foreach ($carts as $cart) {
            $order = new Order;
            $order->product_id = $cart['product_id'];
            $order->user_id = $cart['user_id'];
            $order->payment_method = 'credit card';
            $order->status = 'Ordered';
            $order->quantity = 1;
            $order->address = $req->address;
            $order->save();
        }
        event(new OrderCreated($users,$sum,$email));
        return redirect('/');
    }
    public function addItems(Request $req)
    {
        $product = new Product;
        $product->name = $req->name;
        $product->price = $req->price;
        $product->category = $req->category;
        $product->category = $req->category;
        $product->quantity = $req->quantity;
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
        $datas = Product::With(['carts'])->find($id);
        return view('orders', ['details' => $datas]);
    }
    public function AdminOrder(){
        if (!Gate::allows('isAdmin')) {
            abort(404);
        }
          $Order =Order::with(['user'])->paginate(10);
          return view('adminOrder',['order'=>$Order]);
    }
    public function adminUpdate($id,Request $req){
        $order = Order::find($id);
        $order->status = $req->status;
        $order->save();
        return redirect('/mange');
    }
    public function allcat(Request $req){
        // /return $req->all();
        $product = Product::where('category','=',$req->category)->get();
        return redirect('/cat',['products'=>$product]);
    }
}
