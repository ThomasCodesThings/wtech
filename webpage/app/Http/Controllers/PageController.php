<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function mainpage()
    {
        $productsDiscount = Product::where('productDiscount', true)->take(8)->get();
        $productsNew = Product::latest()->take(5)->get();
        return view('pages.page.home')->with('productsDiscount',$productsDiscount)->with('productsNew',$productsNew );
    }

}