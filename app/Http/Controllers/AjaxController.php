<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductsOrder;
use App\Order;
use App\User;
use App\Review;
use Auth;
use App\Http\Requests\CartBillingRequest;

class AjaxController extends Controller
{
    public function brandAndColor($id = null){   
        if (isset($_POST["brandAndColor"])){
            if ($id == 0){
                $products = Product::whereIn('brand', $_POST["brandAndColor"])
                                ->orWhereIn('color', $_POST["brandAndColor"] )
                                ->paginate(24);
            }else
                $products = Product::where('category_id', $id)
                                ->whereIn('brand', $_POST["brandAndColor"])
                                ->orWhereIn('color', $_POST["brandAndColor"] )
                                ->paginate(24);
        }  
        else{
            if ($id == 0)  $products = Product::paginate(24);
            else    $products = Product::where('category_id', $id)->paginate(24);
        }
        return view('showProducts', [
            'products' => $products, 
        ]);
    }

    public function show($id = null){
        $number = $_POST["show"];
        if ($id == 0)   $products = Product::paginate($number);
        else    $products = Product::where('category_id', $id)->paginate($number);
        
        return view('showProducts', [
            'products' => $products,
        ]);
    }

    public function cart(Request $request){
        $idProduct = $request->input('productId');
        $searchNeedOrder = Order::whereUser_idAndStatus(Auth::user()->id, 'load')->first();
        if (isset ($searchNeedOrder)){
            $orderId = $searchNeedOrder->id;
            $thatProduct = ProductsOrder::whereProduct_idAndOrder_id($idProduct, $orderId)->first();
            if(isset($thatProduct)){
                $productCount = $thatProduct->count;
                $thatProduct->count = $request->input('count') + $productCount;
                $thatProduct->save();
            }    
            else{
                $helpTable = new ProductsOrder;
                $helpTable->product_id = $idProduct;
                $helpTable->order_id = $searchNeedOrder->id;
                $helpTable->count = $request->input('count'); 
                $helpTable->save();
            }
        }
        else{
            $helpTable = new ProductsOrder;
            $orderTable = new Order;
            
            $orderTable->user_id = Auth::user()->id;
            $orderTable->status = 'load';
            $orderTable->save();

            $helpTable->product_id = $idProduct;
            $helpTable->order_id = $orderTable->id;
            $helpTable->count = $request->input('count');  
            $helpTable->save();
        }
    }


    // // Не работает CHOOSEN CATEGORY
    public function priceSlider($id = null){
        $asd = current($_POST["varPr"]);
        $zxc = next($_POST["varPr"]);
        $min = (float)$asd;
        $max = (float)$zxc;
        if ($id == 0)   $products = Product::where('price', '>=', $min)
                                        ->where('price', '<=', $max)
                                        ->paginate(24);
        else    $products = Product::where('category_id', $id)
                                    ->where('price', '>=', $min)
                                    ->where('price', '<=', $max)
                                    ->paginate(24);

        return view('showProducts', [
            'products' => $products,
        ]);
    }

    public function rangePrices($id = null){
        if ($id == 0)   $maxPriceProduct = Product::max('price');
        else    $maxPriceProduct = Product::where('category_id', $id)->max('price');

        return $maxPriceProduct;
    }

    public function sorting($id = null){ 
        $arr = explode(',', $_POST['sort']);
        $tableName = current($arr);
        $direction = next($arr);
        if ($id == 0) $sortProducts = Product::orderBy($tableName, $direction)->get();
        else $sortProducts = Product::where('category_id', $id)->orderBy($tableName, $direction)->get();

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
        if ($request->replyy == "empty field")
            return undefined;
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
    }

    public function billing(CartBillingRequest $request)
    {
        $arr = $request->input('arr');
        $addressInfo = Order::whereStatusAndUser_id('load', Auth::user()->id)->first();
        if (!isset($addressInfo)){
            return array('result' => 'notExist');
        };
        $orderId = $addressInfo->id;
        foreach($arr as $key=>$value){
            $productsOrderInfo = ProductsOrder::whereOrder_idAndProduct_id($orderId, $key)->first();
            $productsOrderInfo->count = $value;
            $productsOrderInfo->save();
        }
        $addressInfo->status = 'send';
        $addressInfo->firstName = $request->input('firstName');
        $addressInfo->lastName = $request->input('lastName');
        $addressInfo->phone = $request->input('phone');    
        $addressInfo->postcode = $request->input('postcode');  
        $addressInfo->address = $request->input('address');    
        $addressInfo->city = $request->input('city');   
        $addressInfo->date = 'Los Angeles';   
        $addressInfo->paymentMethod = 'Paypal';
        $addressInfo->note = $request->input('notes');   
        $addressInfo->save();
    }

    public function deleteProduct(Request $request){
        $orderId = Order::whereUser_idAndStatus(Auth::user()->id, 'load')->first()->id;
        $productId = $request->idProduct;
        ProductsOrder::whereOrder_idAndProduct_id($orderId, $productId)->delete();
        $qwe = ProductsOrder::where('order_id', $orderId)->first();
        if (!isset($qwe)){
            Order::whereUser_idAndStatus(Auth::user()->id, 'load')->delete();
            return array('isEmpty' => 'empty');
        } 
    }
}
