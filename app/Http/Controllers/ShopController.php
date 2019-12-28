<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Contact;
use App\Review;
use App\User;
use Auth;

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
        $brands = Product::all();
        $colors = Product::all();
        $products = Product::paginate(12);
        $productCount = Category::withCount('product')->get();
    

        return view('category', [
            'products' => $products,
            'categories' => $productCount,
            'brands' => $brands,
            'colors' => $colors,
            ]);
    } 
    
    public function choosenCategory($categoryId = null){
        $brands = Product::all();
        $colors = Product::all();
        $products = Product::where ('category_id', $categoryId)->paginate(12);
        $productCount = Category::withCount('product')->get();

        return view('category', [
            'products' => $products, 
            'brands' => $brands,
            'colors' => $colors,
            'categories' => $productCount,
            ]);
    }

    public function productAction($id = null){
        $product = Product::find($id);
        $count = Review::where('rating','!=', '0') ->count();
        $avg = Review::where('rating', '!=', '0')->avg('rating', 2);
        $five = Review::where('rating','=', '5')->count();
        $four = Review::where('rating','=', '4')->count();
        $three = Review::where('rating','=', '3')->count();
        $two = Review::where('rating','=', '2')->count();
        $one = Review::where('rating','=', '1')->count();
        $parentComment = Review::where('parent_id', '0')->get();

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
        return view('cart');
    }

    public function getAddReview(Request $request)
    {
        // Validate the request...

        $feedback = new Review;
        if (Auth::check())
        {
        $feedback->user_id = Auth::user()->id;
        $feedback->parent_id = '0';
        }
        else
        $feedback->user_id = '8';
        $feedback->parent_id = '0';
        $feedback->rating = '0';    
        $feedback->description = $request->message;

        $feedback->save();

        return back();
    }

    public function getConfirmation(){
        return view('confirmation');
    }

}
