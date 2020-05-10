<?php

namespace App\Http\Controllers;

use App\Product;
use App\Contact;
use App\Review;
use App\User;
use App\Order;
use App\ProductsOrder;
use Auth;
use App\Setting;
use App\MainPhoto;
use App\BannerProduct;
use App\Question;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(){
        $dealOfWeeks = Product::where('IsProductOfWeek', '=', 1)->count();

        if(isset($dealOfWeeks) && $dealOfWeeks >= 9)
            $dealOfWeeks = Product::where('IsProductOfWeek', '=', 1)->get()->random(9);
        elseif(isset($dealOfWeeks) && $dealOfWeeks >= 6)
            $dealOfWeeks = Product::where('IsProductOfWeek', '=', 1)->get()->random(6);
        elseif(isset($dealOfWeeks) && $dealOfWeeks >= 3)
            $dealOfWeeks = Product::where('IsProductOfWeek', '=', 1)->get()->random(3);
        else 
            $dealOfWeeks = 'null';
        $football = MainPhoto::where('name', 'For football')->first(); 
        $basketball = MainPhoto::where('name', 'For basketball')->first(); 
        $boxing = MainPhoto::where('name', 'For boxing')->first(); 
        $running = MainPhoto::where('name', 'For running')->first(); 
        $baseball = MainPhoto::where('name', 'For baseball')->first(); 
        $bannerProducts = BannerProduct::all();

        return view('main', [
            'dealOfWeeks' => $dealOfWeeks,
            'football' => $football,
            'baseball' => $baseball,
            'running' => $running,
            'basketball' => $basketball,
            'boxing' => $boxing,
            'bannerProducts' => $bannerProducts,
        ]);
    }

    public function getContact(){
        $contactData = Contact::first();
        
        return view('contact', [
            'contactData' => $contactData,
            ]);
    } 

    public function getLogin(){
        return view('login');
    }
    
    public function productAction($id = null){
        $product = Product::find($id);
        $count = Review::where('rating','!=', '0')->where('product_id', $id) ->count();
        $avg = Review::where('rating', '!=', '0')->where('product_id', $id)->avg('rating', 2);
        $five = Review::where('rating','=', '5')->where('product_id', $id)->count();
        $four = Review::where('rating','=', '4')->where('product_id', $id)->count();
        $three = Review::where('rating','=', '3')->where('product_id', $id)->count();
        $two = Review::where('rating','=', '2')->where('product_id', $id)->count();
        $one = Review::where('rating','=', '1')->where('product_id', $id)->count();
        $parentComment = Review::where('parent_id', '0')
                                ->where('product_id', $id)    
                                ->get();

                                
        $dealOfWeeks = Product::where('IsProductOfWeek', '=', 1)->count();
        if(isset($dealOfWeeks) && $dealOfWeeks >= 9)
            $dealOfWeeks = Product::where('IsProductOfWeek', '=', 1)->get()->random(9);
        elseif(isset($dealOfWeeks) && $dealOfWeeks >= 6)
            $dealOfWeeks = Product::where('IsProductOfWeek', '=', 1)->get()->random(6);
        elseif(isset($dealOfWeeks) && $dealOfWeeks >= 3)
            $dealOfWeeks = Product::where('IsProductOfWeek', '=', 1)->get()->random(3);
        else 
            $dealOfWeeks = 'null';

        return view('product', [
            'product' => $product,
            'count' => $count,
            'avg' => round($avg,2),
            'five' =>$five,
            'four' =>$four,
            'three' =>$three,
            'two' =>$two,
            'one' =>$one,
            'parentComment' =>$parentComment,
            'dealOfWeeks' => $dealOfWeeks,
            ]);
    }

    public function getCheckout(){
        return view('checkout');
    } 

    public function getCart(){
        $order = Order::whereUser_idAndStatus(Auth::user()->id, 'load')->first();
        if (!isset($order)) return redirect('/');
        $orderProducts = $order->products;

        return view('cart', [
            'orderProducts' => $orderProducts,
        ]);
    }

    public function getConfirmation(){
        $orderInfo = Order::whereUser_idAndStatus(Auth::user()->id, 'send')->orderBy('id', 'desc')->first();
        $products = $orderInfo->products;

        return view('confirmation', [
            'orderInfo' => $orderInfo,
            'products' => $products,
        ]);
    }

    public function question(Request $request){
        $question = new Question;
        $question->name = $request->input('name');
        $question->email = $request->input('email');
        $question->subject = $request->input('subject');
        $question->message = $request->input('message');
        $question->save();

        return back();
    }
}
