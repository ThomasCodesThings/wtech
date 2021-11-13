<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function mainpage()
    {
        $products = Product::all();
        return view('pages.page.home',compact('products',$products));
    }

}