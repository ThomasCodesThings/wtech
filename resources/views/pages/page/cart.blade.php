@extends('layout.mainpage')
@section('content')
<div class="container mb-5 marg">
      <h1>Cart</h1>
      
        @if(Session::get('message'))
        {{ Session::get('message') }}
        @endif
      <div class="row" id="cart_row">
          <div class="col-sm-8 mt-3 mb-3">
              @if($cart)
              @foreach($cart as $cart_item)
          <div class="col-sm-auto mb-1">
                  <div class="row">
                 
                      <div class="col-sm-auto">
                          <a href="{{ url('/'.json_decode(json_encode($cart_item['product']), true)['id']) }}"><img src="{{ asset('resources/'.json_decode((json_decode(json_encode($cart_item['product']), true)['productImage']), true)[0] ) }}"></a>
                      </div>                                                                                                                   
                          <div class="col-sm-3">
                              <h5><a href="{{ url('/'.json_decode(json_encode($cart_item['product']), true)['id']) }}">{{ json_decode(json_encode($cart_item['product']), true)['productTitle'] }} </a></h5>
                          </div>
                          <div class="col-sm-3">
                          <form action="{{ route('update-cart') }}" method="post">
                         @csrf
                            <input type="hidden" name="productID" value="{{ json_decode(json_encode($cart_item['product']), true)['id'] }}">
                            <input type="hidden" name="oldAmount" value="{{ json_decode(json_encode($cart_item['quantity']), true) }}">
                            <input type="number" name="newAmount" value="{{ json_decode(json_encode($cart_item['quantity']), true) }}" onchange="this.form.submit()"> 
                        </form>
                            </div>
                          
                          <div class="col-sm-auto">
                              <p>
                                  <b>
                                  {{ json_decode(json_encode($cart_item['product']), true)['productPrice'] * json_decode(json_encode($cart_item['quantity']), true) }}€
                                  </b> ({{ json_decode(json_encode($cart_item['product']), true)['productPrice'] }} x {{ json_decode(json_encode($cart_item['quantity']), true) }}x)
                              </p>
                           </div>
                           <div class="col-sm-auto">
                           <form action="{{ route('delete-product-from-cart') }}" method="post">
                            @csrf
                            <input type="hidden" name="productID" value="{{ json_decode(json_encode($cart_item['product']), true)['id'] }}">
                               <button>X</button>
                               </form>
                           </div>
  
                      </div>
                  </div>
                @endforeach
                @else
                <h4>I´m so empty :(((</h4>
                @endif
          </div>
          @if($cart)
          <div class="col-sm-4" id="checkout">
              <h2>Total</h2>
              <hr>
  
              <div class="row">
                  <div class="col-sm-10">
                      Products price
                  </div>
                  <div class="col-sm-2">
                  <?php
                  $sum = 0;
                  foreach($cart as $cart_item){
                      $sum += (json_decode(json_encode($cart_item['product']), true)['productPrice'] * json_decode(json_encode($cart_item['quantity']), true));
                  }
                  ?>
                  {{ $sum }} €
                  </div>
                  
                </div>
  
              <div class="row">
                  <div class="col-sm-9">
  
                  </div>
                  <div class="col-sm-3">
                      <hr>
                  </div>
              </div>
  
              <div class="row">
                  <div class="col-sm-9">
  
                  </div>
                  <div class="col-sm-3">
                      <h6>{{ $sum }} €</h6>
                  </div>
              </div>
              <form action='/checkouts/create' method="get">
            @csrf
              <div class="row">
                  <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label"><b>I have a coupon code</b></label>
                      <input type="text" class="form-control" id="exampleFormControlInput1" name="couponCode" placeholder="Enter coupon">
                    </div>
              </div>
                  
              <div class="row">
                  <input type="hidden" name="cart">
                  <button class="btn btn-primary" id="go_to_checkout_btn" type="submit">Go to checkout</button>
              </div>
                </form>
              
              </div>
              @endif
          </div>
      </div>
      </div>
  </div>

</body>

@endsection