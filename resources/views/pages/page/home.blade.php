@extends('layout.mainpage')

@section('content')
<div class="container mt-5">
        <div class="row row-cols-lg-3 row-cols-md-3 row-cols-sm-3 row-cols-1 align-items-center justify-content-center text-center">
            <article class="col d-flex justify-content-center text-center">
                <div class="thumbnail">
                    <a href="householdgoods.html">
                    <img src="resources/household-200.jpg" class="img-fluid img-thumbnail">
                    <div class="caption">
                        <p class="text-center">Household goods</p>
                    </div>
                    </a>
                </div>
                </article>

            <article class="col d-flex justify-content-center text-center">
                <div class="thumbnail">
                    <a href="craft.html">
                    <img src="resources/household-200.jpg" alt="Lights" class="img-fluid img-thumbnail">
                    <div class="caption">
                        <p class="text-center">Craft</p>
                    </div>
                    </a>
                </div>
            </article>

            <article class="col d-flex justify-content-center text-center">
                <div class="thumbnail">
                    <a href="toiletries.html">
                    <img src="resources/household-200.jpg" alt="Lights" class="img-fluid img-thumbnail">
                    <div class="caption">
                        <p class="text-center">Toiletries</p>
                    </div>
                    </a>
                </div>
            </article>
        </div>
    </div>

    <div class="container-fluid text-center">
        <div class="row d-flex justify-content-around align-items-start">
            <h1 class="overflow-fix title">New items</h1>
            <hr class="my-4" style="width:90%">

                    @foreach($newProducts as $product)
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
        <button type="button" class="btn btn-dark btn-labeled text-center mb-5">Show more...</button>
    </div>

    <div class="container-fluid text-center">
        <div class="row d-flex justify-content-around align-items-start">

            <h1 class="overflow-fix title">Discounts</h1>
            <hr class="my-4" style="width:90%"><br>

            @foreach($discountProducts as $product)
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
        <button type="button" class="btn btn-dark btn-labeled text-center mb-5">Show more...</button>
    </div>


@endsection