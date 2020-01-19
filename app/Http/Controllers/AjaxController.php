<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductsOrder;
use App\Order;
use Auth;


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

    public function cart(Request $request){

        // $test = new ProductsOrder;
        // $orderTable = new Order;
        // if ((Auth::check()))
        // {
        //     return redirect()->route('login');
        // }
        // else
        // {
        // $orderTable->user_id = 1;
        // $orderTable->status = 'cart';
        // $orderTable->save();
        // $test->product_id = $request->input('numb');
        // $test->order_id = $orderTable->id;
        // $test->save();
        // }
        // return back();
    }
}
