<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function mainpage()
    {
        $products = Product::all()->where('productDiscount', true);
        return view('pages.page.home',compact('products',$products));
    }

    public function householdgoods(){
        $products = Product::all()->where('productType', 'household');
        $brands = array();
        foreach($products as $product){
            array_push($brands, $product->productBrand);
        }
        $brands = array_unique($brands);
        return view('pages.page.householdgoods', compact('products', $products));
    }

    public function craft(){
        $products = Product::all()->where('productType', 'craft');
        return view('pages.page.craft', compact('products', $products));
    }

    public function toiletries(){
        $products = Product::all()->where('productType', 'toiletries');
        return view('pages.page.toiletries', compact('products', $products));
    }
}