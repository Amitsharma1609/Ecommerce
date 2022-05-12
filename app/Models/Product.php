<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cart;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['catergory'];
    public function carts()
    {
        return $this->belongsToMany(Cart::class,'product_carts');
    }
    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
