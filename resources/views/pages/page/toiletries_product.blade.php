@extends('layout.mainpage')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ url('/toiletries') }}">Household goods</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ $product->productTitle }}</li>
  </ol>
</nav>

<div class="container" id="container">
        <div class="row" id="productDetails">
          <div class="col-sm-auto">
            <img src="{{ asset('resources/'.$product->productImage) }}">
          </div>
          <div class="col-sm-6" id="test">
              <h2> {{$product->productTitle }}</h2>

            <div class="row">
              <p>
                {{ $product->productdetail }}
              </p>
            </div>
</div>
            <div class="row">
              
            <div class="col-sm-4">
              <p>
                <b>{{ $product->productPrice }} €</b>
              </p>
            </div>
            <form action="{{ route('add-to-cart') }}" method="post">
            @csrf
            <div class="row">
              <div class="col-sm-4 mt-2">
              <p>
                @if($product->productAmount > 5)
                In stock!
                @elseif($product->productAmount > 0 && $product->productAmount <= 5)
                Only {{ $product->productAmount }} left!
                @else
                Out of stock!
                @endif
              </p>
              @if($product->productAmount > 0)
              <input type="number" name="amount" value="1" min="0" max="{{ $product->productAmount }}">
              @endif
            </div>
            </div>
            @if($product->productAmount > 0)
            <div class="row">  
              <input type="hidden" name="product" value="{{$product}}">
              <button type="submit" class="add_to_cart">Add to cart</button>
            </div>
            @endif
            </form>

          </div>
          </div>
          
        </div>
</div>
@endsection