<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public $brands = [];
    public $maxPrice = 0;

    public function mainpage()
    {
        $discountProducts = Product::where('productDiscount', true)->take(7)->get();
        $newProducts = Product::latest('created_at')->take(7)->get();
        return view('pages.page.home')->with('discountProducts',$discountProducts)->with('newProducts',$newProducts);
    }

    public function search(Request $request){
        $products = Product::where('productTitle', 'ilike', '%' . $request->search . '%')->paginate(21)->withQueryString();
        if(count($products)<1)
            return view('pages.page.message')->with('message',"Nothing found.");
        else
            return view('pages.page.search')->with('products', $products)->with('search',$request->search);
    }

    public function show($id){
        return view('pages.page.home_product', [
            'product' => Product::findOrFail($id)
        ]);
    }

    public function show_category($category,$id){
  
        return view('pages.page.'.$category.'_product', [
            'product' => Product::findOrFail($id)
        ]);
    }
    public function index(Request $request){
        $category = null;
        if(isset($request['category'])){
            $category = $request['category'];
        }
   
        if($category){
            foreach(Product::all()->where('productType', $category) as $product){
                array_push($this->brands, $product->productBrand);
                if($product->productPrice >= $this->maxPrice){
                    $this->maxPrice = $product->productPrice;
                }
            }
            $this->brands = array_unique($this->brands);
            sort($this->brands);
            if(!isset($request['per-page'])){
                $request['per-page'] = 6;
            }

            if(!isset($request['order'])){
                $request['order'] = 'asc';
            }
            
            $products = Product::where('productType', $category);
           
 
            if($request["brands"]){
        
                $products = $products->whereIn('productBrand', $request["brands"]);
            }
            

            if($request['discount']){
                if($request['discount'] === 'true'){
                    $products = $products->where('productDiscount', true);
                }
            }

        
            
            if(!isset($request['priceFrom'])){
                $request['priceFrom'] = 0;
            }else{
                if(!is_numeric($request['priceFrom'])){
                    $request['priceFrom'] = 0;
                }
            }

            if(!isset($request['priceTo'])){
                $request['priceTo'] = $this->maxPrice;
            }else{
                if(!is_numeric($request['priceTo'])){
                    $request['priceTo'] = $this->maxPrice;
                }
            }


            
            $products = $products->where('productPrice', '>=', $request['priceFrom'])->where('productPrice', '<=', $request['priceTo']);
            session()->flashInput($request->input());
            #dd($products->get());
            return view('pages.page.'.$category, ['products' => $products->orderBy('productPrice',$request['order'])->paginate($request['per-page'])->withQueryString(),
            'brands' => $this->brands,
            'maxPrice' => $this->maxPrice]);
        }

    }

}