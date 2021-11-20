<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HouseholdgoodsController extends Controller
{
    public $brands = array();
    public $maxPrice = 0;

    public function index(Request $request){
     
        $params = $request->validate([
            'per-page' => 'integer|min:1|max:50',
            'order' => 'string',
        ]);
    
        if(!isset($params['per-page']))
            $params['per-page'] = 9;

        if(!isset($params['order']) || ($params['order'] != 'asc' && $params['order'] != 'desc'))
            $params['order'] = 'asc';

        $products = Product::where('productType', 'household');

        if(isset($params['order']))
            $products->orderBy('productPrice', $params['order']);

        // withQueryString zachova parametre z predosleho get requestu
        $products = $products->paginate($params['per-page'])->withQueryString();
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

    public function sort(Request $request){
        if($request->has("products")){
            //$products = Product::orWhereIn('id', $request->all()["products"]["id"]);
            $id_array = array();
            foreach($request["products"] as $item){
               array_push($id_array, strval(json_decode($item, true)["id"]));
            }
            $products = Product::orWhereIn('id', $id_array);
            $products->orderBy('productPrice', $request['order']);
            return view('pages.page.householdgoods', [
                'products' => $products->paginate($request['per-page']),
                'brands' => $this->brands,
                'maxPrice' => $this->maxPrice
            ]);
        }
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
