@extends('layout.adminpage')

@section('content')
<h1>Add new product</h1>
<hr>
<form action="/products" method="post">
    {{ csrf_field() }}
    <div class="form-group mb-3">
        <label for="title">Product title</label>
        <input type="text" class="form-control" id="productTitle"  name="productTitle">
    </div>

    <div class="form-group mb-3">
        <label for="productBrand">Brand</label>
        <input type="text" class="form-control" id="productBrand"  name="productBrand">
    </div>

    <div class="form-group mb-3">
        <label for="productPrice">Price</label>
        <input type="text" class="form-control" id="productPrice"  name="productPrice">
    </div>

    <div class="form-group mb-3">
        <label for="productAmount">Amount</label>
        <input type="text" class="form-control" id="productAmount"  name="productAmount">
    </div>

    <div class="form-check mb-3">
        <input class="form-check-input" type="checkbox" id="productDiscount" name="productDiscount" value="checked">
        <label class="form-check-label" for="productDiscount">
            Discount item
        </label>
    </div>

    <div class="input-group mb-3">
        <input type="file" class="form-control" id="productImage" name="productImage">
    </div>

    <div class="form-group form-group-sm mb-3">
        <label  for="productType">Product type</label>
        <select class="form-control" name="productType" id="productType">
            <option value="household">Household goods</option>
            <option value="toiletries">Toiletries</option>
            <option value="craft">Craft</option>
        </select>
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
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection