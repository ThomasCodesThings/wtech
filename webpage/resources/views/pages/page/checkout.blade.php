@extends('layout.mainpage')

@section('content')
        <div class="row overflow-fix row-cols-lg-2 row-cols-md-2 row-cols-sm-1 row-cols-1 ">
            <h1>Checkout</h1>
            <div class="col col-lg-7 col-md-7 col-sm-12 overflow-fix">
                <section class="w-90 p-3 border">
                    <legend>Personal information</legend>
                    
                    <div class="form-group form-group-sm mb-3">
                        <div class="row">
                            <div class="col">
                                <label for="first-name">First name</label>
                                <input type="name" class="form-control" id="first-name" placeholder="Adam">
                            </div>
                            <div class="col">
                                <label for="lastName">Last Name</label>
                                <input type="name" class="form-control" id="lastName" placeholder="Podolský">
                            </div>
                        </div>
                        </div>
        
                        <div class="form-group form-group-sm mb-3">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
        
                        <label for="telephone">Telephone number</label>
                        <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">+421</button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" title="Czech call preset" href="#">+561 CZK</span>
                                            <a class="dropdown-item" title="Slovenia call preset" href="#">+862 SLO</a>
                                            <a class="dropdown-item" title="USA call preset" href="#">+231 USA</a>
                                        </div>
                                </div>
                            <input type="text" class="form-control" id="telephone" aria-describedby="basic-addon3">
                        </div>
                        <legend>Address</legend>
                        <div class="form-group mb-3">
                            <label for="countries">Country</label>
                            <select class="form-control" id="countries">
                            <option>Slovakia</option>
                            <option>Czech</option>
                            <option>Austria</option>
                            <option>Germany</option>
                            <option>Poland</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="form-group form-group-sm mb-3 col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                <label for="day">Region</label>
                                <input type="text" class="form-control" id="day" placeholder="Bratislavský kraj">
                            </div>
        
                            <div class="form-group form-group-sm mb-3 col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                <label for="month">Town</label>
                                <input type="text" class="form-control" id="month" placeholder="Bratislava">
                            </div>
        
                            <div class="form-group form-group-sm mb-3 col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                <label for="year">Postal code</label>
                                <input type="text" class="form-control" id="year" placeholder="821 04">
                            </div>
                        </div>
        
                        <div class="form-group form-group-sm mb-3">
                            <label for="street">Street</label>
                            <input type="text" class="form-control" id="street" placeholder="Antolská">
                        </div>
        
                        <div class="form-group">
                            <label for="details">Additional details</label>
                            <textarea class="form-control" id="details" rows="3"></textarea>
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
                            <div class="mr-3 mb-3">$$$</div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div>Product price</div>
                            <div class="mr-3 mb-3">$$$</div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div>Discount</div>
                            <div class="mr-3 mb-3">%</div>
                        </div>
                        <hr class="my-4" style="width:100%">
                        <div class="d-flex justify-content-between">
                            <div>Total</div>
                            <div class="mr-3 mb-3">$$$</div>
                        </div>
                        <div class="d-flex justify-content-center mt-1">
                            <button type="button" class="btn btn-dark w-100">Order</button>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <div class="row overflow-fix row-cols-lg-2 row-cols-md-2 row-cols-sm-1 row-cols-1 ">

            <div class="col col-lg-7 col-md-7 col-sm-12 overflow-fix">
                <section class="w-90 p-3 border">
                    <legend>Payment method</legend>

                    <div class="row overflow-fix row-cols-lg-4 row-cols-md-2 row-cols-sm-4 row-cols-2 ">
                        <div class="col">
                            <i class="fas fa-credit-card fa-5x" id="CC"></i>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="cc">
                                <label class="form-check-label" for="cc">Credit card</label>
                            </div>
                        </div>
                        <div class="col">
                            <i class="fab fa-cc-visa fa-5x" id="visa"></i>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="visa">
                                <label class="form-check-label" for="visa">Visa</label>
                            </div>
                        </div>
                        <div class="col">
                            <i class="fab fa-cc-paypal fa-5x " id="PP"></i>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="pp">
                                <label class="form-check-label" for="pp">Pay pal</label>
                            </div>
                        </div>
                        <div class="col">
                            <i class="fas fa-money-bill fa-5x" id="cash"></i>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="cash">
                                <label class="form-check-label" for="cash">Pay in cash</label>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="w-90 p-3 border marg">
                    <legend>Delivery details</legend>

                    <div class="form-check border pt-1 pb-1 mb-3 d-flex justify-content-between">
                        <input class="form-check-input ms-1" type="checkbox" value="" id="clk">
                        <label class="form-check-label ms-1" for="clk">Click & collect</label>
                        <i class="fas fa-mouse me-3"></i>
                    </div>

                    <div class="form-check border pt-1 pb-1 mb-3 d-flex justify-content-between">
                        <input class="form-check-input ms-1" type="checkbox" value="" id="hd">
                        <label class="form-check-label ms-1" for="hd">Home delivery</label>
                        <i class="fas fa-home me-3"></i>
                    </div>

                    <div class="form-check border pt-1 pb-1 mb-3 d-flex justify-content-between">
                        <input class="form-check-input ms-1" type="checkbox" value="" id="ls">
                        <label class="form-check-label ms-1" for="ls">Locker system</label>
                        <i class="fas fa-key me-3"></i>
                    </div>

                </section>
            </div>

            <div class="col col-lg-5 col-md-5 col-sm-12 d-flex justify-content-center overflow-fix">
            </div>
        </div>
@endsection