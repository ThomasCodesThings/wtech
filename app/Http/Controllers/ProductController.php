<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        //Product::where('x', 'y')->get();
        return view('products', [
            'products' => $products,
        ]);
        }
    
        public function show($id){
            return view('details', ['id' => $id]);
        }
    
}
