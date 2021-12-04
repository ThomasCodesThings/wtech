@extends('layout.mainpage')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ url('/category/householdgoods') }}">Household goods</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ $product->productTitle }}</li>
  </ol>
</nav>

<div class="container" id="container">
        <div class="row" id="productDetails">
          <div class="col-sm-auto">
            <img id="showcase_img" src="{{ asset('resources/'.json_decode($product->productImage, true)[0]) }}">
          </div>
          <div class="col-sm-auto" id="test">
              <h2> {{$product->productTitle }}</h2>

              <p>
                {{ $product->productdetail }}
              </p>

              <p>
                <b>{{ $product->productPrice }} €</b>
              </p>

          </div>
            <div class="row">
              
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
              <div class="row row-cols-auto" id="value-box">
              <div class="col">
              <button type="button" class="control-btn" onclick="if(document.getElementById('number_input').value > 0){document.getElementById('number_input').value--}">-</button>
              </div>
                <div class="col">
              <input type="number" id="number_input" name="amount" value="1" min="0" max="{{ $product->productAmount }}">
              </div>
              <div class="col">
              <button type="button" class="control-btn" onclick="document.getElementById('number_input').value++">+</button>
              <!--<button type="button" class="control-btn" onclick="if(document.getElementById('number_input').value < {{ $product->productAmount }}){document.getElementById('number_input').value++}">+</button>-->
              </div>
              </div">
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
          @if(count(json_decode($product->productImage, true)) > 0)
          <div class="row" id="product-galery">
            <h3>Product galery</h3>
            <div class="galery">
              <div class="modal" id="modal">
              <img class="modal-content" id="modal_img">
              <span class="close" id="close">&times;</span> 
              </div> 
              <div class="col-sm-auto"> 
              @foreach(json_decode($product->productImage, true) as $image)
              <img src="{{ asset('resources/'.$image) }}" id="product_img" onclick="display(this)">
              @endforeach
              </div>
              <div>
          </div>
          @endif
        </div>
      
</div>
@endsection