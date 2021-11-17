<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function mainpage()
    {
        $discountProducts = Product::where('productDiscount', true)->take(8)->get();
        $newProducts = Product::latest('created_at')->take(8)->get();
        return view('pages.page.home')->with('discountProducts',$discountProducts)->with('newProducts',$newProducts);
    }

    public function search(Request $request){
        $products = Product::where('productTitle', 'ilike', $request->search)->get();
        $brands = array();
        foreach($products as $product){
            array_push($brands, $product->productBrand);
        }
        $brands = array_unique($brands);
        return view('pages.page.search')->with('products', $products)->with('search',$request->search);
    }

}