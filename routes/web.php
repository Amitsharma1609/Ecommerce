<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\sessionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('/uploads/{id}',[ProductController::class,'detail']);
Route::post('/add-to-cart',[ProductController::class,'addtoCart']);
Route::get('/cart-item',[ProductController::class,'cartItem']);
Route::get('/cart-list',[ProductController::class,'cartList']);
Route::get('/remove-cart/{id}',[ProductController::class,'removeItem']);
Route::post('/search',[ProductController::class,'search']);
Route::get('/myorder',[OrderController::class,'myOrder']);
Route::get('/ordernow',[OrderController::class,'orderNow']);
Route::post('/order-place',[OrderController::class,'orderplace']);
Route::get('/manage-item',[AdminController::class,'manageitem'])->name('manage-item');
Route::get('/edit/{id}',[AdminController::class,'edit']);
Route::post('/edit/{id}',[AdminController::class,'update']);
Route::get('/delete/{id}',[AdminController::class,'delete']);
Route::get('/add',function(){
    return view('additem');
});
Route::post('/add',[AdminController::class,'addItems']);
Route::get('/users',[AdminController::class,'users']);
Route::get('/deletes/{id}',[AdminController::class,'deletes']);
Route::get('orders/{id}',[AdminController::class,'orders']);

Route::get('/catergory',[ProductController::class,'catergory']);
Route::post('/cat',[ProductController::class,'allcat']);
Route::get('checkout',[ProductController::class,'checkout']);
Route::post('/checkout',[OrderController::class,'afterpayment'])->name('payment');
Route::get('mange',[AdminController::class,'AdminOrder']);
Route::post('/update/{id}',[AdminController::class,'adminUpdate']);
Route::get('/catergory',[ProductController::class,'catergory']);
Route::post('/cat',[AdminController::class,'allcat']);
Route::get('/cat',function(){
    return view('category');
});
Route::get('/pdf/{id}',[OrderController::class,'invoice']);
Route::get('/cancelled/{id}',[ProductController::class,'cancelled']);
Route::post('/price',[ProductController::class,'filter']);
Route::get('/check',[ProductController::class,'item']);
