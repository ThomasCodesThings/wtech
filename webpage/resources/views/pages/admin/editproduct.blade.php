@extends('layout.adminpage')

@section('content')
<h1>Editácia úlohy</h1>
<hr>
<form action="{{url('products', [$product->id])}}" method="POST">
	<input type="hidden" name="_method" value="PUT">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" value="{{$product->productTitle}}" class="form-control" id="productTitle"  name="title" >
    </div>
    <div class="form-group">
        <label for="productPrice">Opis úlohy</label>
        <textarea class="form-control" id="productPrice" name="productPrice" >{{$product->productPrice}}</textarea>
    </div>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <button type="submit" class="btn btn-primary">Change</button>
</form>
@endsection