<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HouseholdgoodsController extends Controller
{
    public $brands = array();
    public $maxPrice = 0;

    public function index(Request $request){

        if($request->all()){
            if($request->has("priceFrom")){ #filter
                $products = Product::where('productType', 'household');
                $session_products = $products->get();
                for($i = 0; $i < count($session_products); $i++){
                    $product = $session_products[$i];
                    if($request->has("brands")){
                        $foundBrand = false;
                        foreach($request["brands"] as $brand){
                            if($product->productBrand == $brand){
                                $foundBrand = true;
                                break;
                            }
                        }
                        if(!$foundBrand){
                            unset($session_products[$i]);
                            #continue;
                        }
                    }
                    
                    
                    if($request->has("priceFrom")){
                        if($request["priceFrom"] != null && $product->productPrice < $request["priceFrom"]){
                            unset($session_products[$i]);
                            #continue;
                        }
                    }

                    if($request->has("priceTo")){
                        if($request["priceTo"] != null && $product->productPrice > $request["priceTo"]){
                            unset($session_products[$i]);
                            #continue;
                        }
                    }
                    if($request->has("discount")){
                        if($request["discount"] == "true"){
                            if($product->productDiscount == false){
                                unset($session_products[$i]);
                                #continue;
                            }
                        }
                    }
                    
                }
                dd($session_products);
                $id_array = array();
                foreach($session_products as $product){
                    array_push($id_array, $product->id);
                }
                $products = Product::orWhereIn('id', $id_array);
                session()->forget('householdgoods_products');
                session()->put('householdgoods_products', $products->get());
                session()->save();
                if(!$request['per-page']){
                    $request['per-page'] = 6;
                }
                return view('pages.page.householdgoods', [
                    'products' => $products->paginate($request['per-page'])->withQueryString(),
                    'brands' => $this->brands,
                    'maxPrice' => $this->maxPrice
                ]);
            }else{
                $productSession = session()->get('householdgoods_products');
                $id_array = array();
                foreach($productSession as $item){
                    array_push($id_array, $item["id"]);
                }
                $products = Product::orWhereIn('id', $id_array);
                $products->orderBy('productPrice', $request['order']);

                return view('pages.page.householdgoods', [
                    'products' => $products->paginate($request['per-page'])->withQueryString(),
                    'brands' => $this->brands,
                    'maxPrice' => $this->maxPrice
                ]);
            }
        }
       /* if($request->all()){
            $products = null;
            if($request->has("products")){
                $id_array = array();
                foreach($request["products"] as $item){
                    array_push($id_array, strval(json_decode($item, true)["id"]));
                }
                $products = Product::orWhereIn('id', $id_array);
            }
            else{
                #$products = Product::where('productType', 'household');
            }
            #dd($request->all());
            if($products){
                if($request->has("checkbox")){
                    $products = $products->orWhereIn('productBrand', $request->all()["checkbox"])->where('productType', 'household');
                }
                if($request->has("priceFrom")){
                    $products = $products->where('productPrice', '>=', $request->all()["priceFrom"]);
                }
                if($request->has("priceTo")){
                    $products = $products->where('productPrice', '<=', $request->all()["priceTo"]);
                }
                $products->orderBy('productPrice', $request->all()["order"]);
                return view('pages.page.householdgoods', [
                    'products' => $products->paginate($request->all()["per-page"]),
                    'brands' => $this->brands,
                    'maxPrice' => $this->maxPrice
                ]);
            }
        }*/
        $products = Product::where('productType', 'household');
        session()->forget('householdgoods_products');
        session()->put('householdgoods_products', $products->get());
        session()->save();
        return view('pages.page.householdgoods', [
            'products' => $products->paginate(6),
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
            $products = Product::orWhereIn('productBrand', $request->all()["brands[]"])->where('productType', 'household');
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
