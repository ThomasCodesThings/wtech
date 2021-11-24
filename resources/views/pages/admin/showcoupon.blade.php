@extends('layout.adminpage')

@section('content')
<h1>Coupon details </h1>
<div class="jumbotron">
	<div class="h5">Coupon code</div>
    <p>
		{{ $coupon->coupon_code }} 
    </p>

    <div class="h5">Discount</div>
    <p>
		{{ $coupon->discount }} 
    </p>

	<div class="h5">Valid until</div>
	<p>
		{{ $coupon->valid_until }}
	</p>

    
    <div class="btn-group" role="group">
        <a class="btn btn-warning" href="{{ URL::to('coupons/' . $coupon->id . '/edit') }}">Edit</a>&nbsp;&nbsp;
    </div>
</div>
@endsection