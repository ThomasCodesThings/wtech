@extends('layout.mainpage')
@section('content')
<h1 class="overflow-fix title">Results for "{{$search}}" </h1>
<hr class="my-4">

<div class="row justify-content-around overflow-fix">
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