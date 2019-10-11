<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(){
        return view('main');
    }

    public function getContact(){
        return view('contact');
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

        return view('product', [
            'product' => $product 
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
