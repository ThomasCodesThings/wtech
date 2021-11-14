<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HouseholdgoodsController extends Controller
{
    public function index(){
        $products = Product::all()->where('productType', 'household');
        $brands = array();
        foreach($products as $product){
            array_push($brands, $product->productBrand);
        }
        $brands = array_unique($brands);
        sort($brands);
        $data = [$products, $brands];
        return view('pages.page.householdgoods', compact('data'));
    }
}
