<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;

use Illuminate\Http\Request;

class SearchController extends Controller
{ 
    public function search(Request $request){
    	$search = $request->input('search');

	    $products = Product::where('name', 'like', "%$search%")
	       ->orWhere('brand', 'like', "%$search%")
	       ->get();
 
	    return view('result')->with('products', $products);
    }
 
    public function viewProduct($id){
 
        $product = Product::find($id);
 
        return view('product')->with('product', $product);
    }
 
    public function find(Request $request){
        $search = $request->input('search');

        $products = Product::where('name', 'like', "%$search%")
                            ->orWhere('brand', 'like', "%$search%")
                            ->paginate(24);

        $brands = Product::select('brand')
                ->distinct()
                ->get();
        $colors = Product::select('color')
                ->distinct()
                ->get();
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
}
