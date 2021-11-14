<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ToiletriesController extends Controller
{
    public function index(){
        $products = Product::all()->where('productType', 'toiletries');
        $brands = array();
        foreach($products as $product){
            array_push($brands, $product->productBrand);
        }
        $brands = array_unique($brands);
        return view('pages.page.toiletries', compact('products', $products));
    }
}
