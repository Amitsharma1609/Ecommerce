<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\sessionController;
use App\Http\Controllers\ProductController;

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
Route::get('/get',[sessionController::class,'session']);
Route::get('/uploads/{id}',[ProductController::class,'detail']);
Route::get('add-to-cart',[ProductController::class,'addtocart']);
Route::post('/add-to-cart',[ProductController::class,'addtocart']);
Route::get('/cart-item',[ProductController::class,'cartItem']);
Route::get('/cart-list',[ProductController::class,'cartList']);
Route::get('remove-cart/{id}',[ProductController::class,'removeitem']);
Route::post('/search',[ProductController::class,'search']);
Route::get('/myorder',[ProductController::class,'myOrder']);
Route::get('/ordernow',[ProductController::class,'orderNow']);
Route::post('order-place',[ProductController::class,'orderplace']);
Route::get('manage-item',[ProductController::class,'manageitem']);
Route::get('/edit/{id}',[ProductController::class,'edit']);
Route::post('/edit/{id}',[ProductController::class,'update']);
Route::get('/delete/{id}',[ProductController::class,'delete']);
Route::get('/add',function(){
    return view('additem');
});
Route::post('/add',[ProductController::class,'addItems']);
Route::get('/users',[ProductController::class,'users']);
Route::get('/deletes/{id}',[ProductController::class,'deletes']);
Route::get('orders/{id}',[ProductController::class,'orders']);
Route::get('mange',[ProductController::class,'AdminOrder']);
Route::post('/update/{id}',[ProductController::class,'adminUpdate']);
Route::get('/catergory',[ProductController::class,'catergory']);
Route::post('/cat',[ProductController::class,'allcat']);
Route::get('/cat',function(){
    return view('category');
});
