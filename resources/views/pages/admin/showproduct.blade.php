@extends('layout.adminpage')

@section('content')
<h1>Product details: {{ $product->title }}</h1>
<div class="jumbotron">
	<div class="h5">Title</div>
    <p>
		{{ $product->productTitle }} 
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
    @if($product->productDiscount == true)
                    <p><i class="fas fa-check"></i></p>
                @else
                    <p><i class="fas fa-times"></i></p>
    @endif

    <div class="h5">Details</div>
    <p>
		{{ $product->productDetail }} 
    </p>

    <div class="h5">Type</div>
    <p>
		{{ $product->productType }} 
    </p>

    <div class="h5">Images</div>
  @foreach(json_decode($product->productImage, true) as $image)
      <img class="product border border-secondary mb-3" src="{{ asset('resources/'.$image) }}">
  @endforeach
    
    <div class="container mb-3 ps-0">
      <div class="row">
          <a class="btn btn-warning col-sm-1 col-2" href="{{ URL::to('products/' . $product->id . '/edit') }}">Edit</a>&nbsp;&nbsp;
          <div class= "col-sm-1 col-2">
          <form action="{{url('products', [$product->id])}}" method="POST">
              <input type="hidden" name="_method" value="DELETE">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="submit" class="btn btn-danger" value="Delete"/>
          </form>
          </div>
      </div>
    </div>

@endsection