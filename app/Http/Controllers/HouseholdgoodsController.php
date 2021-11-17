<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HouseholdgoodsController extends Controller
{
    public $brands = array();
    public $maxPrice = 0;

    public function index(){
        $products = Product::where('productType', 'household')->paginate(3);
        return view('pages.page.householdgoods', 
        [
            'products' => $products,
            'brands' => $this->brands,
            'maxPrice' => $this->maxPrice
        ]);
    }

    public function show($id)
    {
        return view('pages.page.householdgoods_product', [
            'product' => Product::where('productType', 'household')->findOrFail($id)
        ]);
    }

    public function filter(Request $request){
        $products = null;
        if($request->has("checkbox")){
            $products = Product::orWhereIn('productBrand', $request->all()["checkbox"])->where('productType', 'household');
        }else{
            $products = Product::where('productType', 'household');
        }
        if($products){
            if($request->all()["priceFrom"]){
                $products = $products->where('productPrice', '>=', $request->all()["priceFrom"]);
            }
            if($request->all()["priceTo"]){
                $products = $products->where('productPrice', '<=', $request->all()["priceTo"]);
            }
            return view('pages.page.householdgoods', [
                'products' => $products->paginate(3),
                'brands' => $this->brands,
                'maxPrice' => $this->maxPrice
            ]);
        }
    }

    public function ascendingOrder(){
        $products = Product::where('productType', 'household')->orderBy('productPrice', 'ASC')->paginate(3);
        return view('pages.page.householdgoods', [
            'products' => $products,
            'brands' => $this->brands,
            'maxPrice' => $this->maxPrice
        ]);
    }

    public function descendingOrder(){
        $products = Product::where('productType', 'household')->orderBy('productPrice', 'DESC')->paginate(3);
        return view('pages.page.householdgoods', [
            'products' => $products,
            'brands' => $this->brands,
            'maxPrice' => $this->maxPrice
        ]);
    }

    public function __construct(){
        foreach(Product::all()->where('productType', 'household') as $product){
            array_push($this->brands, $product->productBrand);
            if($product->productPrice >= $this->maxPrice){
                $this->maxPrice = $product->productPrice;
            }
        }
        $this->brands = array_unique($this->brands);
        sort($this->brands);
      }
}
