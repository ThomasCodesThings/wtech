<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('pages.admin.viewproducts',compact('products',$products));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.createproduct');
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
            'productTitle' => 'required|min:3',
            'productPrice' => 'required',
            'productImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = time().'.'.$request->productImage->extension(); 
        $request->productImage->move(public_path('resources'), $imageName);

        $task = Product::create(['productTitle' => $request->productTitle,
        'productImage' => $imageName, 
        'productType' => $request->productType,
        'productBrand' => $request->productBrand,
        'productAmount' => $request->productAmount,
        'productdetail' => $request->productDetail,
        'productDiscount' =>  ($request->productDiscount == "checked") ? true : false,
        'productPrice' => $request->productPrice]);
          
        /*redirect na funkciu show*/
        return redirect('/products/'.$task->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('pages.admin.showproduct',compact('product', $product));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('pages.admin.editproduct',compact('product',$product));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'productTitle' => 'required|min:3',
            'productType' => 'required',
            'productPrice' => 'required',
            'productBrand' => 'required',
            'productAmount' => 'required',
        ]);  
             
        $product->productTitle = $request->productTitle ;
        if(isset($request->productImage))
            $product->productImage = $request->productImage ;
        $product->productType = $request->productType ;
        $product->productPrice = $request->productPrice ;
        $product->productBrand = $request->productBrand ;
        $product->productAmount = $request->productAmount ;
        if(isset($request->productDetail))
            $product->productdetail = $request->productDetail ;
        $product->productDiscount = ($request->productDiscount == null) ? false : true;
        $product->save();
        $request->session()->flash('message', 'Data succesfully changed.');
          
        return redirect('products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Product $product)
    {
        $product->delete();
        $request->session()->flash('message', 'Product deleted succesfully.');
        return redirect('products');
    }
}
