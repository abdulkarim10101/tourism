<section class="w3l-banner-slider-main">
    <div class="top-header-content">
        <header class="tophny-header">
            <div class="container-fluid">
                <div class="top-right-strip row">
                    <!--/left-->
                    <div class="top-hny-left-content col-lg-6 pl-lg-0">
                        {{-- <h6>Upto 30% off on All styles , <a href="#" target="_blank"> Click here for <span
                                    class="fa fa-hand-o-right hand-icon" aria-hidden="true"></span> <span
                                    class="hignlaite">More details</span></a></h6> --}}
                    </div>
                    <!--//left-->
                    <!--/right-->

                    <!--//right-->
                    <div class="overlay-login text-left">
                        <button type="button" class="overlay-close1">
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </button>
                        <div class="wrap">
                            <h5 class="text-center mb-4">Login Now</h5>
                            <div class="login-bghny p-md-5 p-4 mx-auto mw-100">
                                <!--/login-form-->
                                <form action="#" method="post">
                                    <div class="form-group">
                                        <p class="login-texthny mb-2">Email address</p>
                                        <input type="email" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" placeholder="" required="">
                                        <small id="emailHelp" class="form-text text-muted">We'll never share your
                                            email
                                            with anyone else.</small>
                                    </div>
                                    <div class="form-group">
                                        <p class="login-texthny mb-2">Password</p>
                                        <input type="password" class="form-control" id="exampleInputPassword1"
                                            placeholder="" required="">
                                    </div>
                                    <div class="form-check mb-2">
                                        <div class="userhny-check">
                                            <label class="check-remember container">
                                                <input type="checkbox" class="form-check"> <span
                                                    class="checkmark"></span>
                                                <p class="privacy-policy">Remember me</p>
                                            </label>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <button type="submit" class="submit-login btn mb-4">Sign In</button>

                                </form>
                                <!--//login-form-->
                            </div>
                            <!---->
                        </div>
                    </div>
                </div>
            </div>
            <!--/nav-->

            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid serarc-fluid">
                    <a class="navbar-brand" href="/">
                        <span class="lohny">Dubai</span> City Tour
                    </a>

                    <!-- Cart anchor tag -->
                    <a class="btn-open cart-open ml-auto d-md-none position-relative" href="/cart">
                        <span class="fa fa-shopping-cart px-2"></span>
                        <div
                            class="cart-quantity-container position-absolute top-0 end-0 bg-danger rounded-circle d-flex justify-content-center align-items-center">
                            <span class="cart-quantity cartqty1 @if (!Session::has('cart')) d-none @endif">
                                {{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}
                            </span>
                        </div>
                    </a>

                    <style>
                        .cart-quantity-container {
                            width: 18px;
                            height: 18px;
                            left: 60% !important;
                        }

                        .cart-quantity {
                            color: white;
                            font-size: 12px;
                            /* Adjust the font size as needed */
                        }
                    </style>

                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon fa fa-bars"></span>
                    </button>

                    <!-- Navbar collapse -->
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <!-- Your navbar items -->
                            <li class="nav-item active">
                                <a class="nav-link" href="/">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('shop.shop') }}">Activities and Tours</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('giftoliaa.aboutus') }}">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                            </li>
                            <li class="nav-item position-relative d-none d-sm-block">
                                <a class="btn-open" href="/cart">
                                    <span class="fa fa-shopping-cart px-2"></span>
                                    <div class="cart-quantity-container position-absolute top-0 end-0 bg-danger rounded-circle d-flex justify-content-center align-items-center">
                                        <span class="cart-quantity cartqty1 cartqty @if (!Session::has('cart')) d-none @endif">
                                            {{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}
                                        </span>
                                    </div>
                                </a>
                            </li>

                            @auth

                                <li class="nav-item dropdown">
                                    <a class="btn-open" href="#" id="dropdownMenuLink" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <span class="fa fa-user" aria-hidden="true"></span>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="{{ route('customer.myorders') }}">My Dashboard</a>
                                        <a class="dropdown-item" href="{{ route('customer.myorders') }}">Profile</a>
                                        <a class="dropdown-item" href="{{ route('customer.logout') }}">Logout</a>
                                    </div>
                                </li>
                            @endauth
                            @guest
                                <li class="nav-item dropdown">
                                    <a class="btn-open" href="/login">
                                        <span class="fa fa-user" aria-hidden="true"></span>
                                    </a>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>

            <style>
                .btn-open {
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    margin-right: 10px;
                    /* Adjust margin as needed */
                }
            </style>

            <!--//nav-->

        </header>
        <div class="bannerhny-content">
            <div class="content-baner-inf">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="container">
                                <div class="carousel-caption">
                                    <!-- Search Bar with margin-bottom for laptops -->
                                    <form id="searchform" action="{{ route('shop.shop') }}"
                                        class="form-inline justify-content-center mb-lg-5">
                                        <select class="form-control mr-sm-2 search-input js-search-menus" name="keyword"
                                            id="search-input" style="width: 200px;">
                                            <!-- Options will be populated by Select2 -->
                                        </select>
                                        <button class="btn btn-outline-success my-2 my-sm-0"
                                            type="submit">Search</button>
                                    </form>



                                    <!-- End Search Bar -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <style>
            @media (min-width: 992px) {
                .mb-lg-5 {
                    margin-bottom: 150px !important;
                    /* Adjust the margin as per your requirement */
                }
            }
        </style>

</section>
