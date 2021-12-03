<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use App\Models\User;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Shoppingcart;
use App\Models\CartItem;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $itemsInCart = session()->get('cart');
        if(!$itemsInCart)
            return view('pages.page.message')->with('message',"Fill please your shopping cart first.");
            
        $total = 0;
        foreach ($itemsInCart as $item)
            $total += ($item['product']->productPrice * $item['quantity']);

        if(Auth::check()){
            $user = User::find(Auth::user()->id);
            return view('pages.page.checkout')->with('user',$user)->with('total',$total);
        }
        else return view('pages.page.checkout')->with('total',$total);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3',
            'email' => 'required|email',
            'phone' => 'required|numeric|digits:9',
            'country' => 'required|string|min:3',
            'region' => 'required|string|min:3',
            'town' => 'required|string|min:3',
            'postalCode' => 'required|numeric|digits:5',
            'street' => 'required|string|min:3',
            'payment' => 'required',
            'delivery' => 'required',
        ]);

        if(Auth::check()){
            $userID = Auth::user()->id;
            $cart = Shoppingcart::where('user_id',$userID)->where('ordered',false)->get()->first();
            $cart->update(['ordered' => true]);
            //vytvorenie noveho kosika
            $cart = Shoppingcart::create(['user_id' => $userID, 'ordered' => false]);
        }
        else{
            $userID = null;
            $cart = Shoppingcart::create(['userID' => $userID, 'ordered' => true]);
            $itemsInCart = session()->get('cart');

            if(empty($itemsInCart))
                return view('pages.page.message')->with('message',"Fill please your shopping cart first.");
            foreach ($itemsInCart as $item)
                CartItem::create(['shoppingcart_id' => $cart->id, 
                'product_id' => $item['product']->id,
                'quantity' => $item['quantity']]);
        }

        $itemsInCart = session()->get('cart');
        $total = 0;
        foreach ($itemsInCart as $item)
            $total += ($item['product']->productPrice * $item['quantity']);
            Product::where('id', $item['product']->id)->update(['productAmount' => $item['quantity']]);

        Checkout::create(['name' => $request->name,
        'email' => $request->email,
        'userID' => $userID,
        'cartID' => $cart->id,
        'phone' => $request->phone, 
        'country' => $request->country,
        'region' => $request->region,
        'town' => $request->town,
        'postalCode' =>  $request->postalCode,
        'street' => $request->street,
        'details' => $request->details,
        'payment' => $request->payment,
        'delivery' => $request->delivery,
        'total' => $total,
    ]);
       
    unset($itemsInCart);
    session()->forget('cart');
    session()->save();
    return view('pages.page.message')->with('message',"Thank you for your order!");
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function show(Checkout $checkout)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function edit(Checkout $checkout)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Checkout $checkout)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function destroy(Checkout $checkout)
    {
        //
    }
}
