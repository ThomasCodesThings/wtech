@extends('layout.adminpage')

@section('content')
<h1>Detail úlohy: {{ $product->title }}</h1>
<div class="jumbotron">
	<div class="h5">Title</div>
    <p>
		{{ $product->productTitle }} 
    </p>

    <div class="h5">Image</div>
    <p>
		{{ $product->productImage }} 
    </p>

    <div class="h5">Type</div>
    <p>
		{{ $product->productType }} 
    </p>

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
</div>
@endsection