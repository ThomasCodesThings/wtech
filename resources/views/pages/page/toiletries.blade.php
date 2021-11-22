@extends('layout.mainpage_wt_banner')
@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Toiletries</li>
  </ol>
</nav>
<h1 class="overflow-fix title">Toiletries</h1>
<hr class="my-4">
<div class="container-fluid overflow-fix w-100" id="filter_container">
          <h4>Filter</h4>
          <form method="get" action="{{ url('toiletries')}}">
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
                      <div class="col-sm-auto">
                        <div class="brand">
                          <input type="checkbox" name="brands[]" value="{{ $brand }}">
                          <label for="{{ $brand }}"> {{ $brand }} </label>
                        </div>
                      </div>
                      @endforeach
                      </div>
                      <input type="checkbox" id="discount" name="discount" value="true">
                      <label for="discount">Discount products only</label>
                      <div class ="row">
                      <hr>
                      <div class="col-sm-2">
                        <button type="submit">Submit</button>
                        </div>
                      </div>
                    </div>
                    <!--@foreach($products as $product)
                      <input type="hidden" name="products[]" value="{{ $product }}">
                    @endforeach-->
                    </form>
                    <form method="get" action="{{ url('toiletries')}}">
                      @csrf
                      <select name="per-page" onfocus="this.selectedIndex = 0";>
                      <option value="2">2</option>
                        <option value="4">4</option>
                        <option value="6">6</option>
                        <option value="8">8</option>
                        <option value="16">16</option>
                        <option value="32">32</option>
                        <option value="64">64</option>
                      </select>
                      <select name="order" onfocus="this.selectedIndex = 0";>
                        <option value="asc">Ascending</option>
                        <option value="desc">Descending</option>
                      </select>
                      <button type="submit">Sort</button>
                    </form>
              </div>


<div class="row justify-content-around overflow-fix">
@foreach($products as $product)
<article class="product text-center col-auto mb-3">
                            <a class="d-block" href="{{ url('toiletries/'.$product->id) }}">
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