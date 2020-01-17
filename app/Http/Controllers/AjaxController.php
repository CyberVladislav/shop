<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class AjaxController extends Controller
{
    public function brandAndColor($brandOrColor=null){
        $brandOrColor = $_POST["brand"];
        $products = Product::where ('brand', '=', $brandOrColor)
                            ->orWhere('color', '=', $brandOrColor)
                            ->get();

        return view('showProducts', [
            'products' => $products, 
        ]);
    }

    public function show($number = null){
        $number = $_POST["numb"];
        $products = Product::paginate($number);

        return view('showProducts', [
            'products' => $products,
        ]);
    }

}
