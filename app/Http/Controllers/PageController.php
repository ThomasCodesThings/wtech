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
        $products = Product::where('productTitle', 'ilike', '%' . $request->search . '%')->get();

        if(count($products)<1)
            return view('pages.page.message')->with('message',"Nothing found.");
        else
            return view('pages.page.search')->with('products', $products)->with('search',$request->search);
    }

    public function show($id){
        return view('pages.page.home_product', [
            'product' => Product::findOrFail($id)
        ]);
    }

}