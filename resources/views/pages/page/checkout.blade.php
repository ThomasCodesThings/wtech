@extends('layout.mainpage_wt_banner')

@section('content')
<form action="/checkouts" method="post">
    {{ csrf_field() }}
        <div class="row overflow-fix row-cols-lg-2 row-cols-md-2 row-cols-sm-1 row-cols-1 ">
            <h1>Checkout</h1>
            <div class="col col-lg-7 col-md-7 col-sm-12 overflow-fix">
                <section class="w-90 p-3 border">
                    <legend>Personal information</legend>
                    
                        <label for="name">Name</label>
                        @auth
                        <input type="name" class="form-control" id="name" name="name" value="{{ $user->name }}">
                        @else
                        <input type="name" class="form-control" id="name" name="name" placeholder="Adam Podolský">
                        @endauth
                        @error('name')
                        <div class="error-alert">Please fill in your name for delivery.</div>
                        @enderror

                        <div class="form-group form-group-sm mt-3">
                            <label for="email">Email address</label>
                            @auth
                            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" value="{{ $user->email }}">
                            @else
                            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                            @endauth
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            @error('email')
                                <div class="error-alert">Please fill in your email to receive info about delivery.</div>
                            @enderror
                        </div>
        
                        <label for="telephone" class="mt-3">Telephone number</label>
                        <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">+421</button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" title="Czech call preset" href="#">+561 CZK</span>
                                            <a class="dropdown-item" title="Slovenia call preset" href="#">+862 SLO</a>
                                            <a class="dropdown-item" title="USA call preset" href="#">+231 USA</a>
                                        </div>
                                </div>
                            <input type="text" class="form-control" id="telephone" aria-describedby="basic-addon3" name="phone">
                        </div>
                        @error('phone')
                            <div class="error-alert">Please fill in your phone number.</div>
                        @enderror

                        <legend>Address</legend>
                        <div class="form-group mt-3">
                            <label for="countries">Country</label>
                            <select class="form-control" id="countries" name="country">
                            <option>Slovakia</option>
                            <option>Czech</option>
                            <option>Austria</option>
                            <option>Germany</option>
                            <option>Poland</option>
                            </select>
                            @error('country')
                                <div class="error-alert">Please fill in your country.</div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="form-group form-group-sm mt-3 col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                <label for="day">Region</label>
                                <input type="text" class="form-control" id="day" placeholder="Bratislavský kraj" name="region">
                                @error('region')
                                    <div class="error-alert">Please fill in your region.</div>
                                @enderror
                            </div>
        
                            <div class="form-group form-group-sm mt-3 col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                <label for="month">Town</label>
                                <input type="text" class="form-control" id="month" placeholder="Bratislava" name="town">
                                @error('town')
                                    <div class="error-alert">Please fill in your town .</div>
                                @enderror
                            </div>
        
                            <div class="form-group form-group-sm mt-3 col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                <label for="year">Postal code</label>
                                <input type="text" class="form-control" id="year" placeholder="821 04" name="postalCode">
                                @error('postalCode')
                                    <div class="error-alert">Please fill in your postal code.</div>
                                @enderror
                            </div>
                        </div>
        
                        <div class="form-group form-group-sm mt-3">
                            <label for="street">Street</label>
                            <input type="text" class="form-control" id="street" placeholder="Antolská" name="street">
                            @error('street')
                                <div class="error-alert">Please fill your street name.</div>
                            @enderror
                        </div>
        
                        <div class="form-group mt-3">
                            <label for="details">Additional details</label>
                            <textarea class="form-control" id="details" rows="3" name="details"></textarea>
                        </div>
                    </section>
            </div>
        
            <div class="col col-lg-5 col-md-5 col-sm-12 d-flex justify-content-center overflow-fix">
                <section class="w-100">
                    <div class="border p-3">
                        <legend>Checkout</legend>
                        <hr class="my-4" style="width:100%">
                        <div class="d-flex justify-content-between">
                            <div>Delivery</div>
                            <div class="mr-3 mb-3">5 $</div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div>Product price</div>
                            <div class="mr-3 mb-3"> {{$total}}$</div>
                        </div>
                        <hr class="my-4" style="width:100%">
                        <div class="d-flex justify-content-between">
                            <div>Total</div>
                            <div class="mr-3 mb-3">{{$total + 5}} $</div>
                        </div>
                        <div class="d-flex justify-content-center mt-1">
                            <button type="submit" class="btn btn-dark w-100">Order</button>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <div class="row overflow-fix row-cols-lg-2 row-cols-md-2 row-cols-sm-1 row-cols-1 ">

            <div class="col col-lg-7 col-md-7 col-sm-12 overflow-fix">
                <section class="w-90 p-3 border marg mt-3">
                    <legend>Payment method</legend>

                    <div class="row overflow-fix row-cols-lg-4 row-cols-md-2 row-cols-sm-4 row-cols-2">
                        <div class="col">
                            <i class="fas fa-credit-card fa-5x" id="CC"></i>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="cc" name="payment" value='creditCard'>
                                <label class="form-check-label" for="cc">Credit card</label>
                            </div>
                        </div>
                        <div class="col">
                            <i class="fab fa-cc-visa fa-5x" id="visa"></i>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="visa" name="payment" value='visa'>
                                <label class="form-check-label" for="visa">Visa</label>
                            </div>
                        </div>
                        <div class="col">
                            <i class="fab fa-cc-paypal fa-5x " id="PP"></i>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="pp" name="payment" value= 'payPal'>
                                <label class="form-check-label" for="pp">Pay pal</label>
                            </div>
                        </div>
                        <div class="col">
                            <i class="fas fa-money-bill fa-5x" id="cash"></i>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="cash" name="payment" value='cash'>
                                <label class="form-check-label" for="cash">Pay in cash</label>
                            </div>
                        </div>
                    </div>
                </section>
                @error('payment')
                    <div class="error-alert">Please select type of payment.</div>
                @enderror

                <section class="w-90 p-3 border marg mt-3">
                    <legend>Delivery details</legend>

                    <div class="form-check border pt-1 pb-1 mb-3 d-flex justify-content-between">
                        <input class="form-check-input ms-1" type="radio" id="clk" name="delivery" value="CC">
                        <label class="form-check-label ms-1" for="clk">Click & collect</label>
                        <i class="fas fa-mouse me-3"></i>
                    </div>

                    <div class="form-check border pt-1 pb-1 mb-3 d-flex justify-content-between">
                        <input class="form-check-input ms-1" type="radio" id="hd" name="delivery" value="HD">
                        <label class="form-check-label ms-1" for="hd">Home delivery</label>
                        <i class="fas fa-home me-3"></i>
                    </div>

                    <div class="form-check border pt-1 pb-1 mb-3 d-flex justify-content-between">
                        <input class="form-check-input ms-1" type="radio" id="ls" name="delivery" value="LS">
                        <label class="form-check-label ms-1" for="ls">Locker system</label>
                        <i class="fas fa-key me-3"></i>
                    </div>
                </section>
                @error('delivery')
                        <div class="error-alert">Please select type of delivery.</div>
                @enderror

                <button type="submit" class="btn btn-dark w-100 mt-3">Order</button>
            </div>
        </div>
</form>
@endsection