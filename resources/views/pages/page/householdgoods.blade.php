@extends('layout.mainpage')
@section('content')
<h1 class="overflow-fix title">Household goods</h1>
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
                      @foreach($data[1] as $brand)
                      <div class="col-sm-2">
                        <div class="brand">
                          <input type="checkbox" id="brand1" name="brand" value="Brand1">
                          <label for="brand1"> {{ $brand }} </label>
                        </div>
                      </div>
                      @endforeach
                      </div>
                      
                      <div class ="row">
                        <hr>
                      </div>
                    </div>
          
              </div>


<div class="row justify-content-around">
@foreach($data[0] as $product)
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