<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function show(){
        dd(session()->get('cart'));
    }

    public function add(Request $request){
        $product = json_decode($request->product);
        if($product->productAmount <= 0){
            return redirect()->back();
        }
        if($product->productAmount < $request->amount){
            return redirect()->back();
        }
        if(!$product || !$request->amount){
            return redirect()->back()->with('message', 'Wrong input!');
        }
        if($request->amount <= 0){
           return redirect()->back()->with('message', 'Amount cannot be lower or equal to 0!');
        }
        $cart = session()->get('cart');
        if(!$cart){
            $cart = [
                $product->id => [
                    'product' => $product,
                    'quantity' => $request->amount
                   ]
                ];
                session()->put('cart', $cart);
                return redirect()->back()->with('success', 'Product added to cart successfully!');
           }
       if(isset($cart[$product->id])){
           $cart[$product->id]['quantity'] += $request->amount;
           Product::where('id', $product->id)->update(['productAmount' => ($product->productAmount - $request->amount)]);
           session()->put('cart', $cart);
           return redirect()->back()->with('success', 'More amount of product was added to cart successfully!');
       }
   
       $cart[$product->id] = [
           'product' => $product,
           'quantity' => $request->amount
       ];
       Product::where('id', $product->id)->update(['productAmount' => ($product->productAmount - $request->amount)]);
       session()->put('cart', $cart);
       return redirect()->back()->with('success', 'New product was added to cart successfully!');
       }

}
