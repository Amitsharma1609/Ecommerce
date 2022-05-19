<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;

class AdminController extends Controller
{
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

    public function AdminOrder()
    {
        if (!Gate::allows('isAdmin')) {
            abort(404);
        }
        $Order = Order::with(['user','product'])->get();
        //return $Order[0]->product->name;
        return view('adminOrder', ['order' => $Order]);
    }
    public function adminUpdate($id, Request $req)
    {
        $order = Order::find($id);
        $order->status = $req->status;
        $order->save();
        return redirect('/mange');
    }
    public function allcat(Request $req)
    {
        $product = Product::where('category', '=', $req->category)->get();
        return view('category', ['products' => $product]);
    }
}
