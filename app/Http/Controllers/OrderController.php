<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use PDF;

class orderController extends Controller
{
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
    public function orders($id)
    {
        $datas = Product::With(['carts'])->find($id);
        return view('orders', ['details' => $datas]);
    }
    public function invoice($id)
    {
        $order = Order::with(['product'])->where('id', '=', $id)->get();
        $pdf = PDF::loadView('pdf', ['order' => $order]);
        return $pdf->download('Mypdf.pdf');
    }
    public function orderplace(Request $req)
    {
        $req->validate([
            'payment' => 'required',
            'address' => 'required',
        ]);
        $users = Cart::with(['products'])
            ->where('carts.user_id', auth()->user()->id)
            ->get();
        $sum = 0;
        foreach ($users as $user) {
            $sum = $sum + $user->products[0]->price * $user->quantity;
        }
        \Stripe\Stripe::setApiKey(ENV('STRIPE_SECRET'));

        $payment_intent = \Stripe\PaymentIntent::create([
            'description' => 'Stripe Test Payment',
            'amount' => $sum,
            'currency' => 'INR',
            'description' => 'Payment',
            'payment_method_types' => ['card'],
        ]);
        $intent = $payment_intent->client_secret;

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
        event(new OrderCreated($users, $sum, $email));
        return view('Stripe', ['intent' => $intent, 'sum' => $sum]);
    }
    public function afterPayment()
    {
        return view('payment');
    }
}
