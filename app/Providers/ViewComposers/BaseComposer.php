<?php

namespace App\Providers\ViewComposers;

use Illuminate\Contracts\View\View;
use App\Category;
use App\Order;
use Auth;

class BaseComposer{
    public function compose(View $view){
    $url = $_SERVER['REQUEST_URI'];
    $view->with('url', $url);
        if (Auth::check()){
            $fullCart = Order::whereUser_idAndStatus(Auth::user()->id, 'load')->first(); 
            $view->with('fullCart', $fullCart);
        }
    }
}
