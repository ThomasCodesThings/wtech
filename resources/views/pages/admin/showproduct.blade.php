@extends('layout.adminpage')

@section('content')
<h1>Product details: {{ $product->title }}</h1>
<div class="jumbotron">
	<div class="h5">Title</div>
    <p>
		{{ $product->productTitle }} 
    </p>

    <div class="h5">Images</div>
  
    @foreach(json_decode($product->productImage, true) as $image)
        <img class="product border border-secondary" src="{{ asset('resources/'.$image) }}">
    @endforeach

	<div class="h5">Price</div>
	<p>
		{{ $product->productPrice }}
	</p>

    <div class="h5">Brand</div>
    <p>
		{{ $product->productBrand }} 
    </p>

    <div class="h5">Amount</div>
    <p>
		{{ $product->productAmount }} 
    </p>

    <div class="h5">Discount</div>
    <p>
		{{ $product->productDiscount }} 
    </p>

    <div class="h5">Details</div>
    <p>
		{{ $product->productDetail }} 
    </p>

    <div class="h5">Type</div>
    <p>
		{{ $product->productType }} 
    </p>
    
    <div class="btn-group" role="group">
        <a class="btn btn-warning mb-5" href="{{ URL::to('products/' . $product->id . '/edit') }}">Edit</a>&nbsp;&nbsp;
    <form action="{{url('products', [$product->id])}}" method="POST">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="submit" class="btn btn-danger" value="Delete"/>
    </form>
    </div>

@endsection