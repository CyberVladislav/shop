<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductsOrder;
use App\Order;
use App\User;
use App\Review;
use Auth;


class AjaxController extends Controller
{
    public function brandAndColor(){   
        if (isset($_POST["brandAndColor"]))
            $products = Product::whereIn('brand', $_POST["brandAndColor"])
                                ->orWhereIn('color', $_POST["brandAndColor"] )
                                ->paginate(24);
        else    
            $products = Product::paginate(24);
        
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


    // Не работает CHOOSEN CATEGORY
    // public function priceSlider(){
    //     $asd = current($_POST["varPr"]);
    //     $zxc = next($_POST["varPr"]);
    //     $min = (float)$asd;
    //     $max = (float)$zxc;
    //     $products = Product::where('price', '>', $min)
    //                         ->where('price', '<', $max)
    //                         ->paginate(24);
        
    //     return view('showProducts', [
    //         'products' => $products,
    //     ]);
    // }

    public function rangePrices(){
        $minPriceProduct = Product::min('price');
        $maxPriceProduct = Product::max('price');

        return array('min' => $minPriceProduct, 'max' => $maxPriceProduct);
    }

    public function sorting(){ 
        $arr = explode(',', $_POST['sort']);
        $tableName = current($arr);
        $direction = next($arr);
        $sortProducts = Product::orderBy($tableName, $direction)->get();

        return view('showProducts',[
            'products' => $sortProducts,
        ]);
    }

    public function leaveReview(Request $request){        
        $feedback = new Review;
        if (Auth::check()){
            $feedback->user_id = Auth::user()->id;
            $feedback->parent_id = '0';
        }
        else{
            $feedback->user_id = '4';
            $feedback->parent_id = '0';
        }
        $feedback->product_id = $request->idProduct;
        $feedback->rating = $request->rating;    
        $feedback->description = $request->message;
        $feedback->save();

        return view('lastReview', [            
            'parentComment' =>$feedback,
        ]);
    }

    public function feedbackReply(Request $request){
        $feedback = new Review;
        if (Auth::check()){
            $feedback->user_id = Auth::user()->id;
            $feedback->parent_id = $request->idOfParentOrChild;;
        }
        else{
            $feedback->user_id = '4';
            $feedback->parent_id = $request->idOfParentOrChild;
        }
        $feedback->product_id = $request->idOfProduct;
        $feedback->rating = '0';    
        $feedback->description = $request->replyy;
        $feedback->save();

        return view('repl',[
            'child' => $feedback
            ]);
        // return response()->json(['html' => view('repl',['child' => $feedback])->render(), 'test' => $idlast]);
    }
}
