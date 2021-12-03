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
        $products = Product::where('productTitle', 'ilike', '%' . $request->search . '%')->get();

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

    public function index(Request $request){
        dd($request->all());
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

            $validated_request = $request->validate([
                'priceFrom' => 'numeric',
                'priceTo' => 'numeric',
                'per-page' => 'numeric'
            ]);

            $products = Product::where('productType', $category);

            if(!isset($validated_request['priceFrom'])){
                $validated_request['priceFrom'] = 0;
            }

            if(!isset($validated_request['priceTo'])){
                $validated_request['priceTo'] = $this->maxPrice;
            }
            
            if($request->has('brands')){
      
                $products = $products->orWhereIn('productBrand', $request["brands"]);
            }
            
            if($request->has('discount')){
                if($request['discount'] === 'true'){
                    $products = $products->where('productDiscount', true);
                    print_r("HELLO");
                }
            }

            
            $products = $products->where('productPrice', '>=', $validated_request['priceFrom'])->where('productPrice', '<=', $validated_request['priceTo']);
            
  
            return view('pages.page.'.$category, ['products' => $products->orderBy('productPrice',$request['order'])->paginate($validated_request['per-page'])->withQueryString(),
            'brands' => $this->brands,
            'maxPrice' => $this->maxPrice]);
        }

    }

}