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

}