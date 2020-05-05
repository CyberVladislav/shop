<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Order;
use App\ProductsOrder;
use Auth;

class Product extends Model
{
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function brandCount()
    {
        return count(Product::where('brand', '=', $this->brand)->get());
    }

    public function colorCount()
    {
        return count(Product::where('color', '=', $this->color)->get());
    }
    
    public function orders()
    {
        return $this->belongsToMany('App\Order', 'products_orders', 'product_id', 'order_id');
    }
    
    public function productsCartCount()
    {
        $orderId = Order::whereUser_idAndStatus(Auth::user()->id, 'load')->first()->id;
        $quantityProducts = ProductsOrder::whereProduct_idAndOrder_id($this->id, $orderId)->first()->count;
        return $quantityProducts;
    }

    public function confirmationProductsCount()
    {
        $orderId = Order::whereUser_idAndStatus(Auth::user()->id, 'send')->orderBy('id', 'desc')->first()->id;
        $quantityProducts = ProductsOrder::whereProduct_idAndOrder_id($this->id, $orderId)->first()->count;
        return $quantityProducts;
    }

    public function confirmationProductsCost()
    {
        $orderId = Order::whereUser_idAndStatus(Auth::user()->id, 'send')->orderBy('id', 'desc')->first()->id;
        $quantityProducts = ProductsOrder::whereProduct_idAndOrder_id($this->id, $orderId)->first()->count;
        $productPrice = Product::where('id', $this->id)->first()->price;
        return $quantityProducts * $productPrice;
    }
}
