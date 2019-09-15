<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(){
        return view('welcome');
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
        return view('category');
    } 

    public function getProduct(){
        return view('product');
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

