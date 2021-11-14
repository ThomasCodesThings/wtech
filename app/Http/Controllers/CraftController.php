<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CraftController extends Controller
{
    public function index(){
        $products = Product::all()->where('productType', 'craft');
        $brands = array();
        foreach($products as $product){
            array_push($brands, $product->productBrand);
        }
        $brands = array_unique($brands);
        return view('pages.page.craft', compact('products', $products));
    }
}
