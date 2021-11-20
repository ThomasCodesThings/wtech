@extends('layout.mainpage')
@section('content')
<h1 class="overflow-fix title">Household goods</h1>
<hr class="my-4">
<div class="container-fluid overflow-fix w-100" id="filter_container">
          <h4>Filter</h4>
          <form method="post">
          @csrf
          <div class="container-fluid overflow-fix" id="filter_settings">
            <h5>Price</h5>
            <div class="row">
            <div class="col-sm-1" id="priceCol">
            <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label"><h7>From €</h7></label>
                    <input name="priceFrom" type="text" class="form-control" id="priceFrom" placeholder="">
                  </div>
            </div>
            <div class="col-sm-auto">
              <p>0</p>
            </div>  
            <div class="col-sm-9" id="priceRange">
                    <input type="range" class="form-range" id="priceFromRange" min="0", max="{{ $maxPrice }}">
                  </div>
          <div class="col-sm-auto">
              <p>{{ $maxPrice }}</p>
            </div> 
            </div>
            <div class="row">
            <div class="col-sm-1" id="priceCol">
            <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label"><h7>To €</h7></label>
                    <input name="priceTo" type="text" class="form-control" id="priceTo" placeholder="">
                  </div>
            </div>
            <div class="col-sm-auto">
              <p>0</p>
            </div>  
            <div class="col-sm-9" id="priceRange">
                    <input type="range" class="form-range" id="priceToRange" min="0", max="{{ $maxPrice }}">
                  </div>
          <div class="col-sm-auto">
              <p>{{ $maxPrice }}</p>
            </div> 
            </div>  
                    <div class="row">
                      <hr>
                    </div>
                    <div class="row">
                      <h5>Brands</h5>
                    </div>
                    <div class="row">
                      @foreach($brands as $brand)
                      <div class="col-sm-2">
                        <div class="brand">
                          <input type="checkbox" name="checkbox[]" value="{{ $brand }}">
                          <label for="{{ $brand }}"> {{ $brand }} </label>
                        </div>
                      </div>
                      @endforeach
                      </div>
                      
                      <div class ="row">
                      <hr>
                      <div class="col-sm-2">
                        <button type="submit">Submit</button>
                        
                        </div>
                      </div>
                    </div>
                    </form>
                    <form method="post" action="{{ route('householdgoods.display') }}">
                    @csrf
                    @foreach($products as $product)
                      <input type="hidden" name="products[]" value="{{ $product }}">
                    @endforeach
                      <select name="per-page" onchange="this.form.submit()" onfocus="this.selectedIndex = -1";>
                      <option value="2">2</option>
                        <option value="4">4</option>
                        <option value="6" selected="selected">6</option>
                        <option value="8">8</option>
                        <option value="16">16</option>
                        <option value="32">32</option>
                        <option value="64">64</option>
                      </select>
                      <select name="order" onchange="this.form.submit()" onfocus="this.selectedIndex = -1";>
                        <option value="asc" selected="selected">Ascending</option>
                        <option value="desc">Descending</option>
                      </select>
                    </form>
              </div>


<div class="row justify-content-around overflow-fix">
@foreach($products as $product)
<article class="product text-center col-auto mb-3">
                            <a class="d-block" href="{{ url('householdgoods/'.$product->id) }}">
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
{{ $products->links()}}
</div>

@endsection