<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Contact;
use App\Review;
use App\User;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(){
        return view('main');
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

    public function getCategory(){
        $products = Product::paginate(12);
        $categories = Category::all();

        return view('category', [
            'products' => $products,
            'categories' => $categories
            ]);
    } 
    
    public function choosenCategory($categoryId = null){
        $categories = Category::all();
        $products = Product::where ('category_id', $categoryId)->paginate(12);

        return view('category', [
            'products' => $products, 
            'categories' => $categories 
            ]);
    }


    public function productAction($id = null){
        $product = Product::find($id);
        $feedbacks = Review::all();
        $count = Review::all()->count();
        $avg = Review::all()->avg('rating');
        $five = Review::where('rating','=', '5')->count();
        $four = Review::where('rating','=', '4')->count();
        $three = Review::where('rating','=', '3')->count();
        $two = Review::where('rating','=', '2')->count();
        $one = Review::where('rating','=', '1')->count();
        $zero = Review::where('rating','=', '0')->count();

        return view('product', [
            'product' => $product,
            'feedbacks' => $feedbacks,
            'count' => $count,
            'avg' => $avg,
            'five' =>$five,
            'four' =>$four,
            'three' =>$three,
            'two' =>$two,
            'one' =>$one,
            'zero' =>$zero,
            ]);
    }

    public function getCheckout(){
        return view('checkout');
    } 

    public function getCart(){
        return view('cart');
    }

    public function getConfirmation(){
        return view('confirmation');
    }
 
}
