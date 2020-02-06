<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductsOrder;
use App\Order;
use App\User;
use Auth;


class AjaxController extends Controller
{
    public function brandAndColor(){   
        if (isset($_POST["brandAndColor"]))
            $products = Product::whereIn('brand', $_POST["brandAndColor"])
                                ->orWhereIn('color', $_POST["brandAndColor"] )
                                ->paginate(12);

        else    
            $products = Product::paginate(12);
        
        return view('showProducts', [
            'products' => $products, 
        ]);
    }

    public function show($number = null){
        $number = $_POST["show"];
        $products = Product::paginate($number);

        return view('showProducts', [
            'products' => $products,
        ]);
    }

    public function cart(Request $request){

        if (!(Auth::check())){
            return array('result' => 'reload');
        }
        else{
            $searchNeedOrder = Order::whereUser_idAndStatus(Auth::user()->id, 'load')->first();
            if (isset ($searchNeedOrder)){
                $helpTable = new ProductsOrder;
                $helpTable->product_id = $request->input('productId');
                $helpTable->order_id = $searchNeedOrder->id;
                $helpTable->save();
            }
            else{
                $helpTable = new ProductsOrder;
                $orderTable = new Order;
                    
                $orderTable->user_id = Auth::user()->id;
                $orderTable->status = 'load';
                $orderTable->save();

                $helpTable->product_id = $request->input('productId');
                $helpTable->order_id = $orderTable->id;
                $helpTable->save();
            }
        }
        return back();
    }

}
