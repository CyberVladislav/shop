<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getCategory(){
        $brands = Product::select('brand')
                            ->distinct()
                            ->get();
        $colors = Product::select('color')
                            ->distinct()
                            ->get();
        $products = Product::paginate(24);
        $productCount = Category::withCount('product')->get();
        $dealOfWeeks = Product::where('IsProductOfWeek', '=', 1)->count();

        if(isset($dealOfWeeks) && $dealOfWeeks >= 9)
            $dealOfWeeks = Product::where('IsProductOfWeek', '=', 1)->get()->random(9);
        elseif(isset($dealOfWeeks) && $dealOfWeeks >= 6)
            $dealOfWeeks = Product::where('IsProductOfWeek', '=', 1)->get()->random(6);
        elseif(isset($dealOfWeeks) && $dealOfWeeks >= 3)
            $dealOfWeeks = Product::where('IsProductOfWeek', '=', 1)->get()->random(3);
        else 
            $dealOfWeeks = 'null';

        return view('category', [
            'products' => $products,
            'categories' => $productCount,
            'brands' => $brands,
            'colors' => $colors,
            'dealOfWeeks' => $dealOfWeeks
            ]);
    } 

    public function choosenCategory($categoryId = null){
        $brands = Product::select('brand')
                            ->distinct()
                            ->get();
        $colors = Product::select('color')
                            ->distinct()
                            ->get();
        $products = Product::where ('category_id', $categoryId)->paginate(24);
        $productCount = Category::withCount('product')->get();
        $dealOfWeeks = Product::where('IsProductOfWeek', '=', 1)->count();
        
        if(isset($dealOfWeeks) && $dealOfWeeks >= 9)
            $dealOfWeeks = Product::where('IsProductOfWeek', '=', 1)->get()->random(9);
        elseif(isset($dealOfWeeks) && $dealOfWeeks >= 6)
            $dealOfWeeks = Product::where('IsProductOfWeek', '=', 1)->get()->random(6);
        elseif(isset($dealOfWeeks) && $dealOfWeeks >= 3)
            $dealOfWeeks = Product::where('IsProductOfWeek', '=', 1)->get()->random(3);
        else 
            $dealOfWeeks = 'null';

        return view('category', [
            'products' => $products, 
            'brands' => $brands,
            'colors' => $colors,
            'categories' => $productCount,
            'dealOfWeeks' => $dealOfWeeks,
            ]);
    }

}
