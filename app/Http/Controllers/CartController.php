<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function show(){
        if(!session()->get('cart')){
            //return redirect()->back();
        }
        return view('pages.page.cart', ['cart' => session()->get('cart')]);
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
                session()->save();
                return redirect()->back()->with('success', 'Product added to cart successfully!');
           }
       if(isset($cart[$product->id])){
           $cart[$product->id]['quantity'] += $request->amount;
           //Product::where('id', $product->id)->update(['productAmount' => ($product->productAmount - $request->amount)]); Toto sprav až pri odoslaní!!!
           session()->put('cart', $cart);
           session()->save();
           return redirect()->back()->with('success', 'More amount of product was added to cart successfully!');
       }
   
       $cart[$product->id] = [
           'product' => $product,
           'quantity' => $request->amount
       ];
       Product::where('id', $product->id)->update(['productAmount' => ($product->productAmount - $request->amount)]);
       
       return redirect()->back()->with('success', 'New product was added to cart successfully!');
       }

       public function update(Request $request){
           $cart = session()->get('cart');
           if($cart){
               if($request['newAmount'] == 0){
                    unset($cart[$request['productID']]);
                    session()->put('cart', $cart);
                    session()->save();
                    return view('pages.page.cart', ['cart' => session()->get('cart')]);
               }
               $cart[$request['productID']]['quantity'] = $request['newAmount'];
               session()->put('cart', $cart);
               session()->save();
               return view('pages.page.cart', ['cart' => session()->get('cart')]);
           }
       }

       public function delete(Request $request){
           if($request->has('productID')){
            $cart = session()->get('cart');
            unset($cart[$request['productID']]);
            session()->put('cart', $cart);
            session()->save();
           }
           return redirect()->route('display-cart');
       }
}
