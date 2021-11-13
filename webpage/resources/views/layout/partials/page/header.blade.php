<title>Homepage</title>
<header class="container-fluid">
    <div class="row row-cols-lg-3 row-cols-md-3 row-cols-sm-2 row-cols-1 align-items-center justify-content-center">
        <section class="col order-lg-1 order-md-1 order-sm-1 order-1">
            <a class="dropbtn overflow-fix" id="menu"><i class="fas fa-bars nav-icon fa-1.5x"></i></a>
            <ul class="nav_category menu" id="dropdown_category">
                <li class ="navbar"><a href="">Household goods</a></li>
                <li class ="navbar"><a href="">Craft</a></li>
                <li class ="navbar"><a  href="">Toiletries</a></li>
                <li class ="navbar"><a  href="{{ URL::route('checkout') }}">Checkout</a></li>
            </ul>
            <a class="home-link overflow-fix" href="/">i♥home.com</a>
        </section>

        <section class="col order-lg-2 order-md-2 order-sm-3 order-2 order-2 col-sm-12 col-12">
            <input class="form-control form-control-sm mb-1" name="search" type="text" placeholder="Search">
        </section>

        <nav class="col nav d-flex justify-content-end order-lg-3 order-md-3 order-sm-2 order-3">
            <a id="login" class="link">Log in</a>
            <a href="{{ URL::route('form') }}">Sign up</a>
            <a href="cart.html"><i class="fa fa-shopping-cart nav-icon" aria-hidden="true"></i></a>
        </nav>

        <section class=" col-lg-12 col-md-12 col-sm-12 col-12 order-4 nav second-nav d-flex justify-content-center">
            <a href="/delivery">Free delivery</a>
            <a href ="/special offers">Customer reward system</a>
            <a href="/special offers">Special offers every month</a>
        </section>
    </div>

    <div class="log_in" id="login_box">
            <label for="floatingEmail">Email address</label>
            <input type="email" class="form-control form-control-md mb-1" id="floatingEmail" placeholder="name@example.com">
            <label for="floatingPassword">Password</label>
            <input type="password" class="form-control form-control-md mb-1" id="floatingPassword" placeholder="Password">
          <div class="row">
              <div class="col-sm-auto">
                  <button id="login_button" class="btn btn-dark btn-sm">Log in</button>
              </div>
              <div class="col-sm-auto">
                  <a class="text-end fw-light" href="">Having problems with login?</a>
              </div>
          </div>
    </div>
</header>