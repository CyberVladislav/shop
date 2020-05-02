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
    
    public function productsCount()
    {
        $orderId = Order::whereUser_idAndStatus(Auth::user()->id, 'load')->first()->id;
        $productsOrder = ProductsOrder::whereProduct_idAndOrder_id($this->id, $orderId)->first();
        $count = $productsOrder->count;
        return $count;
    }
}
