<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
    
}
