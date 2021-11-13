@extends('layout.mainpage')
@section('content')
<h1 class="overflow-fix title">Craft</h1>
<hr class="my-4">
<div class="container-fluid overflow-fix w-100" id="filter_container">
          <h4>Filter</h4>
          <div class="container-fluid overflow-fix" id="filter_settings">
            <h5>Price</h5>
            <div class="row">
              <div class="col-sm-1" id="priceCol">
                <div class="row">
                <div class="col-sm-12">
                  <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label"><h7>From €</h7></label>
                    <input type="text" class="form-control" id="priceFrom" placeholder="">
                  </div>
                </div>
                </div> 
                </div>
                <div class="col-sm-10" id="priceRange">
                    <input type="range" class="form-range" id="filterPriceRange">
                  </div>
                  
                  <div class="col-sm-1" id="priceCol">
                    <div class="row">
                    <div class="col-sm-12">
                      <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label"><h7>To €</h7></label>
                        <input type="text" class="form-control" id="priceTo" placeholder="">
                      </div>
                    </div>
                    </div>
                    </div>
                    
                    </div>
                    <div class="row">
                      <hr>
                    </div>
                    <div class="row">
                      <h5>Brand</h5>
                    </div>
                    <div class="row">
                      <div class="col-sm-2">
                        <div class="brand">
                          <input type="checkbox" id="brand1" name="brand" value="Brand1">
                          <label for="brand1"> Brand1</label>
                        </div>
                      </div>
                        
                      <div class="col-sm-2">
                        <div class="brand">
                          <input type="checkbox" id="brand2" name="brand" value="Brand1">
                          <label for="brand2"> Brand2</label>
                        </div>
                      </div>
      
                      <div class="col-sm-2">
                        <div class="brand">
                          <input type="checkbox" id="brand3" name="brand" value="Brand1">
                          <label for="brand3"> Brand3</label>
                        </div>
                      </div>
      
                      <div class="col-sm-2">
                        <div class="brand">
                          <input type="checkbox" id="brand4" name="brand" value="Brand1">
                          <label for="brand4"> Brand4</label>
                        </div>
                      </div>
      
                      <div class="col-sm-2">
                        <div class="brand">
                          <input type="checkbox" id="brand5" name="brand" value="Brand1">
                          <label for="brand5"> Brand5</label>
                        </div>
                      </div>
      
                      <div class="col-sm-2">
                        <div class="brand">
                          <input type="checkbox" id="brand6" name="brand" value="Brand1">
                          <label for="brand6"> Brand6</label>
                        </div>
                      </div>
      
                      <div class="col-sm-2">
                        <div class="brand">
                          <input type="checkbox" id="brand7" name="brand" value="Brand1">
                          <label for="brand7"> Brand7</label>
                        </div>
                      </div>
      
                      <div class="col-sm-2">
                        <div class="brand">
                          <input type="checkbox" id="brand8" name="brand" value="Brand1">
                          <label for="brand8"> Brand8</label>
                        </div>
                      </div>
                      
                      <div class="col-sm-2">
                        <div class="brand">
                          <input type="checkbox" id="brand9" name="brand" value="Brand1">
                          <label for="brand9"> Brand9</label>
                        </div>
                      </div>
      
                      </div>
                      
                      <div class ="row">
                        <hr>
                      </div>
                    </div>
          
              </div>


<div class="row justify-content-around">
@foreach($products as $product)
<article class="product text-center col-auto mb-3">
                            <a class="d-block" href="#">
                                <img class="product border border-secondary" src="{{ asset('resources/'.$product->productImage) }}">
                                <p class="product">{{$product->productTitle}}</p>
                            </a>
                            <div class="container">
                                <div class="row row-cols-lg-2 row-cols-md-2 row-cols-sm-2 row-cols-1 no-gutters">
                                    <div class="col">
                                        <p class="product text-center"><data value="50">{{$product->productPrice}}</data>$</p>
                                    </div>
                                    <div class="col">
                                        <a href="/buy/" class="product text-center">Buy</a> 
                                    </div>
                                </div>
                            </div>
                        </article>
@endforeach
</div>
@endsection