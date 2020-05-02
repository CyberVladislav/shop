<?php

namespace App\Http\Controllers;

use App\Product;
use App\Contact;
use App\Review;
use App\User;
use App\Order;
use App\ProductsOrder;
use Auth;

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

        return view('main', [
        'dealOfWeeks' => $dealOfWeeks
            ]);
    }

    public function getContact(){
        $contacts = Contact::all();

        return view('contact', [
            'contacts' => $contacts
            ]);
    } 

    public function getBlog(){
        return view('blog');
    } 

    public function getSingleBlog(){
        return view('singleBlog');
    } 

    public function getLogin(){
        return view('login');
    } 

    public function getTracking(){
        return view('tracking');
    } 

    public function getElements(){
        return view('elements');
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
            ]);
    }

    public function getCheckout(){
        return view('checkout');
    } 

    public function getCart(){
        $orderNumber = Order::whereUser_idAndStatus(Auth::user()->id, 'load')->first();
        if (!isset($orderNumber)) return redirect('/');
        $numbOfOrderProducts = $orderNumber->products;

        return view('cart', [
            'numbOfOrderProducts' => $numbOfOrderProducts,
        ]);
    }

    public function getConfirmation(){
        return view('confirmation');
    }

}
