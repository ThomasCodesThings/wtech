@extends('layout.adminpage')

@section('content')
<h1>Add new product</h1>
<hr>
<form action="/products" method="post" enctype="multipart/form-data">
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

    <div class="form-group mb-3">
        <label for="title">Details</label>
        <input type="textarea" class="form-control" id="productDetail"  name="productDetail">
    </div>

    <div class="form-group form-group-sm mb-3">
        <label  for="productType">Product type</label>
        <select class="form-control" name="productType" id="productType">
            <option value="householdgoods">Household goods</option>
            <option value="toiletries">Toiletries</option>
            <option value="craft">Craft</option>
        </select>
    </div>

    <label for="img">Images</label>
    <div class="input-group hdtuto control-group lst increment" id="img">
        <input type="file" name="filenames[]" class="myfrm form-control mb-3">
    </div>
    <div class="clone hide md-5">
        <div class="hdtuto control-group lst input-group" style="margin-top:10px">
            <input type="file" name="filenames[]" class="myfrm form-control mb-3">
            <div class="input-group-btn"> 
                <button class="btn btn-danger" type="button">Remove</button>
            </div>
        </div>
    </div>
    <div class="input-group-btn"> 
            <button class="btn btn-success mb-3" type="button" id="increment">Add another image</button>
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
    <button type="submit" class="btn btn-dark mb-5">Submit</button>
</form>

<script type="text/javascript">
    $(document).ready(function() {
      $(".btn-success").click(function(){ 
          var lsthmtl = $(".clone").html();
          $(".increment").after(lsthmtl);
      });
      $("body").on("click",".btn-danger",function(){ 
          $(this).parents(".hdtuto").remove();
      });
    });
</script>

@endsection