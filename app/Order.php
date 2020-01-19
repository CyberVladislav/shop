<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function products()
    {
        return $this->belongsToMany('App\Product', 'products_orders', 'order_id', 'product_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
