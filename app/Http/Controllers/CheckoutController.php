<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $total = 0;
        foreach ($itemsInCart as $item)
            $total += $item['product']->productPrice;

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
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'country' => 'required',
            'region' => 'required',
            'town' => 'required',
            'postalCode' => 'required',
            'street' => 'required',
            'payment' => 'required',
            'delivery' => 'required',
        ]);

        if(Auth::check()){
            $userID = Auth::user()->id;
            if(User::find(Auth::user()->id)->hasCart())
                $cart = Shoppingcart::where('user_id',Auth::user()->id)->where('ordered',false)->get();
            else
                $cart = Shoppingcart::create(['user_id' => $userID, 'ordered' => true]);
        }
        else{
            $userID = null;
            $cart = Shoppingcart::create(['userID' => $userID, 'ordered' => true]);
        }

        $itemsInCart = session()->get('cart');
        foreach ($itemsInCart as $item)
            CartItem::create(['shoppingcart_id' => $cart->id, 
            'product_id' => $item['product']->id,
            'quantity' => $item['quantity']]);

        
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
        'total' => 10,
    ]);
       
    unset($itemsInCart);
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
