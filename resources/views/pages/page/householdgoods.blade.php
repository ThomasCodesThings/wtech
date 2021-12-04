@extends('layout.mainpage_wt_banner')
@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Household goods</li>
  </ol>
</nav>
<div class="container-fluid overflow-fix w-100" id="filter_container">

          <h4>Filter</h4>
          <form method="get" action="{{ url('/category/householdgoods')}}">
          @csrf
          <div class="container-fluid overflow-fix" id="filter_settings">
            <h5>Price</h5>
            <div class="row">
            <div class="col-sm-1" id="priceCol">
            <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label"><h7>From €</h7></label>
                    <input name="priceFrom" type="text" class="form-control" id="priceFrom" placeholder="" value="{{ old('priceFrom') }}">
                  </div>
            </div>
            <div class="col-sm-auto">
              <p>0</p>
            </div>  
            <div class="col-sm-9" id="priceRange">
                    <input type="range" class="form-range" id="priceFromRange" min="0", max="{{ $maxPrice }}", value="{{ old('priceFrom') }}">
                  </div>
          <div class="col-sm-auto">
              <p>{{ $maxPrice }}</p>
            </div> 
            </div>
            <div class="row">
            <div class="col-sm-1" id="priceCol">
            <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label"><h7>To €</h7></label>
                    <input name="priceTo" type="text" class="form-control" id="priceTo" placeholder="", value="{{ old('priceTo') }}">
                  </div>
            </div>
            <div class="col-sm-auto">
              <p>0</p>
            </div>  
            <div class="col-sm-9" id="priceRange">
                    <input type="range" class="form-range" id="priceToRange" min="0", max="{{ $maxPrice }}", value="{{ old('priceTo') }}">
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
                          <input type="checkbox" name="brands[]" value="{{ $brand }}"
                          {{ (is_array(old('brands')) && in_array($brand, old('brands'))) ? ' checked' : '' }}
                          >
                          <label for="{{ $brand }}"> {{ $brand }} </label>
                        </div>
                      </div>
                      @endforeach
                      </div>
                      <input type="checkbox" id="discount" name="discount" value="true"
                      {{ (old('discount') == true) ? ' checked' : '' }}
                      >
                      <label for="discount">Discount products only</label>
                      <div class ="row">
                      <hr>
                      <div class="col-sm-2">
                        <button type="submit">Submit</button>
                        </div>
                      </div>
                    </div>

                      <select name="per-page" onchange="this.form.submit();" onfocus="this.selectedIndex = -1";>
                      <option value="2"
                      {{ (old('per-page') == 2) ? ' selected' : '' }}>2</option>
                        <option value="4"
                        {{ (old('per-page') == 4) ? ' selected' : '' }}>4</option>
                        <option value="6"
                        {{ (old('per-page') == 6) ? ' selected' : '' }}>6</option>
                        <option value="8"
                        {{ (old('per-page') == 8) ? ' selected' : '' }}>8</option>
                        <option value="16"
                        {{ (old('per-page') == 16) ? ' selected' : '' }}>16</option>
                        <option value="32"
                        {{ (old('per-page') == 32) ? ' selected' : '' }}>32</option>
                        <option value="64"
                        {{ (old('per-page') == 64) ? ' selected' : '' }}>64</option>
                      </select>
                      <select name="order" onchange="this.form.submit();" onfocus="this.selectedIndex = -1";>
                        <option value="asc"
                        {{ (old('order') == "asc") ? ' selected' : '' }}>Ascending</option>
                        <option value="desc"
                        {{ (old('order') == "desc") ? ' selected' : '' }}>Descending</option>
                      </select>
                      
                    </form>
              </div>


<div class="row d-flex justify-content-start overflow-fix">
@foreach($products as $product)
<article class="product text-center col-auto mb-3">
                            <a class="d-block" href="{{ url('/householdgoods/'.$product->id) }}">
                                <img class="product border border-secondary" src="{{ asset('resources/'.json_decode($product->productImage, true)[0]) }}">
                                <p class="product">{{$product->productTitle}}</p>
                            </a>
                            <div class="container">
                                <div class="row row-cols-lg-2 row-cols-md-2 row-cols-sm-2 row-cols-1 no-gutters">
                                    <div class="col">
                                        <p class="product text-center"><data value="50">{{$product->productPrice}}</data>$</p>
                                    </div>
                                    <div class="col">
                                    <form action="{{ route('add-to-cart') }}" method="post">
                                  @csrf
                                    <input type="hidden" name="product" value="{{$product}}">
                                    <input type="hidden" name="amount" value="1">
                                    <a href="javascript:;" onclick="parentNode.submit();" class="product text-center">Buy</a> 
                                    </form> 
                                    </div>
                                </div>
                            </div>
                        </article>
@endforeach
<div class="fix-pagination-a">
{{ $products->links()}}
</div>
</div>

@endsection