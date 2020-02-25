<?php

namespace App\Providers\ViewComposers;

use Illuminate\Contracts\View\View;
use App\Category;

class BaseComposer{
    public function compose(View $view){
    $url = $_SERVER['REQUEST_URI'];
    $view->with('url', $url);
    }
}
