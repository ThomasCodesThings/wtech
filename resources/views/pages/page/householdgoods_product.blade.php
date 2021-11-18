@extends('layout.mainpage')

@section('content')

<div class="container" id="container">
        <div class="row" id="productDetails">
          <div class="col-sm-auto">
            <img src="{{ asset('resources/'.$product->productImage) }}">
          </div>
          <div class="col-sm-6" id="test">
              <h2> {{$product->productTitle }}</h2>

            <div class="row">
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus a leo at nibh finibus placerat. Nulla sollicitudin congue nulla id dapibus. Nulla vitae quam vel felis tristique volutpat. Hello www.
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