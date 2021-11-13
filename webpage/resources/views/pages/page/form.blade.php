@extends('layout.mainpage')

@section('content')

<div class="row overflow-fix row-cols-lg-2 row-cols-md-2 row-cols-sm-1 row-cols-1 align-items-center">
        <section class="col overflow-fix">
    
            <h1 class="overflow-fix">Create new account</h1>
                <p class="overflow-fix">*Please enter your personal details</p>
                <form class="forms">
                    <section>
                        <legend>Login details</legend>
                        <div class="form-group form-group-sm mb-3 has-validation">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            <div class="invalid-feedback">
                                Please fill in your email address.
                                </div>
                        </div>
    
                        <div class="form-group form-group-sm mb-3">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Password">
                            <div class="invalid-feedback">
                                Invalid password.
                                </div>
                        </div>
    
                        <div class="form-group form-group-sm mb-3">
                            <label for="password-again">Confirm password</label>
                            <input type="password" class="form-control" id="password-again" placeholder="Password">
                            <div class="invalid-feedback">
                                Invalid password.
                                </div>
                        </div>
                    </section>
    
                    <section>
                        <legend>Personal information (Optional)</legend>
                            <div class="form-group form-group-sm mb-3">
                                <label for="first-name">First name</label>
                                <input type="name" class="form-control" id="first-name" placeholder="Adam">
                            </div>
                            <div class="form-group form-group-sm mb-3">
                                <label for="lastName">Last Name</label>
                                <input type="name" class="form-control" id="lastName" placeholder="Podolský">
                            </div>
    
                            <div class="form-group form-group-sm mb-3">
                                <label  for="gender">Gender</label>
                                <select class="form-control" name="gender" id="gender">
                                    <option value="female">Male</option>
                                    <option value="male">Female</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
    
                            <label>Date of birth</label>
                            <div class="form-group form-group-sm mb-3">
                                <div class="row">
                                    <div class="form-group form-group-sm mb-3 col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                        <label for="day">Day</label>
                                        <input type="number" class="form-control" id="day" placeholder="6">
                                    </div>
    
                                    <div class="form-group form-group-sm mb-3 col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                        <label for="month">Month</label>
                                        <input type="number" class="form-control" id="month" placeholder="12">
                                    </div>
    
                                    <div class="form-group form-group-sm mb-3 col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                        <label for="year">Year</label>
                                        <input type="number" class="form-control" id="year" placeholder="1999">
                                    </div>
                                </div>
                            </div>
    
                            <label for="telephone">Telephone number</label>
                            <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">+421</button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">+561 CZK</span>
                                                <a class="dropdown-item" href="#">+862 SLO</a>
                                                <a class="dropdown-item" href="#">+231 USA</a>
                                            </div>
                                    </div>
                                <input type="text" class="form-control" id="telephone" aria-describedby="basic-addon3">
                            </div>
                        </section>
                        <section>
                            <legend>Address (Optional)</legend>
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
                                    <input type="text" class="form-control" id="street" placeholder="Password">
                                </div>
    
                                <div class="form-group mb-3">
                                    <label for="details">Additional details</label>
                                    <textarea class="form-control" id="details" rows="3"></textarea>
                                </div>
                        </section>
                        <button type="button" class="btn btn-dark">Create new account</button>
                </form>
        </section>
    </div>
@endsection