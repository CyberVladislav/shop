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
}

