@extends('frontend.layouts.app')
@section('content')
    <section class="w3l-grids-hny-2">
        <!-- /content-6-section -->
        <div class="grids-hny-2-mian py-5">
            <div class="container py-lg-5">

                <h3 class="hny-title mb-0 text-center">Top Dubai <span>Tours</span> & <span>Activities</span></h3>
                <p class="mb-4 text-center">Handpicked Favourites just for you</p>
                <div class="welcome-grids row mt-5">

                    @foreach ($categories as $item)
                        <div class="col-lg-2 col-md-4 col-6 welcome-image">
                            <div class="boxhny13">
                                <a href="{{ route('shop.productbycategory', $item->slug) }}">
                                    <img src="{{ $item->image }}" style="width: 160px; height:160px;" class="img-fluid"
                                        alt="" />
                                    <div class="boxhny-content">
                                        <h3 class="title">View All
                                    </div>
                                </a>
                            </div>
                            <h4><a href="#">{{ $item->name }}</a></h4>

                        </div>
                    @endforeach


                </div>

            </div>
        </div>
    </section>
    <!-- //content-6-section -->


    <section class="w3l-ecommerce-main">
        <!-- /View Alls-->
        <div class="ecom-contenthny py-5">
            <div class="container py-lg-5">
                <h3 class="hny-title mb-0 text-center">Things to do in Dubai</h3>
                <p class="text-center">Handpicked Favourites just for you</p>
                <!-- /row-->
                <div class="ecom-products-grids row mt-lg-5 mt-3">
                    @foreach ($products as $item)
                        <div class="col-lg-3 col-6 product-incfhny mt-4">
                            <div class="product-grid2 transmitv">
                                <div class="product-image2">
                                    <a href="{{ route('shop.productdetail', $item->slug) }}">
                                        <img class="pic-1 img-fluid"
                                            src="{{ $item->images->first() ? $item->images->first()->images : '' }}">
                                        <img class="pic-2 img-fluid"
                                            src="{{ $item->images->first() ? $item->images->first()->images : '' }}">
                                    </a>
                                    {{-- <ul class="social">
                                    <li><a href="#" data-tip="Quick View"><span class="fa fa-eye"></span></a></li>

                                    <li><a href="#" data-tip="Add to Cart"><span
                                                class="fa fa-shopping-bag"></span></a>
                                    </li>
                                </ul> --}}

                                </div>
                                <div class="product-content">
                                    <h3 class="title"><a href="#">{{ $item->name }} </a></h3>
                                    <span class="price">AED {{ $item->price }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
                <!-- //row-->
            </div>
        </div>
    </section>
    <!-- //products-->
    {{-- <section class="w3l-content-5">
        <!-- /content-6-section -->
        <div class="content-5-main">
            <div class="container">
                <div class="content-info-in row">
                    <div class="content-gd col-md-6 offset-lg-3 text-center">
                        <h3 class="hny-title two">
                            Tons of Products & Options to
                            <span>change</span>
                        </h3>
                        <p>Ea consequuntur illum facere aperiam sequi optio consectetur adipisicing elitFuga, suscipit totam
                            animi consequatur saepe blanditiis.Lorem ipsum dolor sit amet,Ea consequuntur illum facere
                            aperiam sequi optio consectetur adipisicing elit..</p>
                        <a href="#" class="read-more-btn2 btn">
                            Shop Now
                        </a>

                    </div>

                </div>

            </div>
        </div>
    </section> --}}
    <!-- //content-6-section -->
    {{-- <section class="w3l-post-grids-6">
        <!-- /post-grids-->
        <div class="post-6-mian py-5">
            <div class="container py-lg-5">
                <h3 class="hny-title text-center mb-0 ">Latest Blog <span>Posts</span></h3>
                <p class="mb-5 text-center">Handpicked Favourites just for you</p>
                <div class="post-hny-grids row mt-5">
                    <div class="col-lg-3 col-md-6 grids5-info column-img" id="zoomIn">
                        <a href="#">
                            <figure>
                                <img class="img-fluid" src="/frontend/assets/images/bg1.jpg" alt="blog-image">
                            </figure>
                        </a>

                        <div class="blog-thumbhny-caption">
                            <ul class="blog-info-list">
                                <li><a href="#admin">By admin</a></li>
                                <li class="date-post">
                                    Aug 10, 2020</li>
                            </ul>
                            <h4><a href="#">Here to bring your life style to the next level.</a></h4>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 grids5-info column-img" id="zoomIn">
                        <a href="#">
                            <figure>
                                <img class="img-fluid" src="/frontend/assets/images/bg2.jpg" alt="blog-image">
                            </figure>
                        </a>
                        <div class="blog-thumbhny-caption">
                            <ul class="blog-info-list">
                                <li><a href="#admin">By admin</a></li>
                                <li class="date-post">
                                    Aug 10, 2020</li>
                            </ul>
                            <h4><a href="#">Here to bring your life style to the next level.</a></h4>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 grids5-info column-img" id="zoomIn">
                        <figure>
                            <img class="img-fluid" src="/frontend/assets/images/bg3.jpg" alt="blog-image">
                        </figure>
                        <div class="blog-thumbhny-caption">
                            <ul class="blog-info-list">
                                <li><a href="#admin">By admin</a></li>
                                <li class="date-post">
                                    Aug 10, 2020</li>
                            </ul>
                            <h4><a href="#">Here to bring your life style to the next level.</a></h4>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 grids5-info column-img" id="zoomIn">
                        <figure>
                            <img class="img-fluid" src="/frontend/assets/images/bg4.jpg" alt="blog-image">
                        </figure>
                        <div class="blog-thumbhny-caption">
                            <ul class="blog-info-list">
                                <li><a href="#admin">By admin</a></li>
                                <li class="date-post">
                                    Aug 10, 2020</li>
                            </ul>
                            <h4><a href="#">Here to bring your life style to the next level.</a></h4>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section> --}}
    <!-- //post-grids-->
    <section class="w3l-customers-sec-6">
        <div class="customers-sec-6-cintent py-5">
            <!-- /customers-->
            <div class="container py-lg-5">
                <h3 class="hny-title text-center mb-0 ">Customers <span>Love</span></h3>
                <p class="mb-5 text-center">What People Say</p>
                <div class="row customerhny my-lg-5 my-4">
                    <div class="col-md-12">
                        <div id="customerhnyCarousel" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#customerhnyCarousel" data-slide-to="0" class="active"></li>
                                <li data-target="#customerhnyCarousel" data-slide-to="1"></li>
                            </ol>
                            <!-- Carousel items -->
                            <div class="carousel-inner">

                                <div class="carousel-item active">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="customer-info text-center">
                                                <div class="feedback-hny">
                                                    <span class="fa fa-quote-left"></span>
                                                    <p class="feedback-para">Dubai was an unforgettable experience for me
                                                        and my family. Our tour organized by {{ config('app.name') }} was
                                                        impeccable. From exploring the towering Burj Khalifa to indulging in
                                                        the vibrant culture at the Dubai Souks, every moment was filled with
                                                        excitement and wonder.</p>
                                                </div>
                                                <div class="feedback-review mt-4">
                                                    <img src="/frontend/assets/images/c1.jpg" class="img-fluid"
                                                        alt="">
                                                    <h5>Smith Roy</h5>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="customer-info text-center">
                                                <div class="feedback-hny">
                                                    <span class="fa fa-quote-left"></span>
                                                    <p class="feedback-para">My trip to Dubai organized by {{ config('app.name') }} was simply amazing. The desert safari, the luxury shopping
                                                        experience, and the breathtaking views from the Palm Jumeirah were
                                                        highlights of our journey. Can't wait to plan another adventure with
                                                        them!</p>
                                                </div>
                                                <div class="feedback-review mt-4">
                                                    <img src="/frontend/assets/images/c2.jpg" class="img-fluid"
                                                        alt="">
                                                    <h5>Lora Grill</h5>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="customer-info text-center">
                                                <div class="feedback-hny">
                                                    <span class="fa fa-quote-left"></span>
                                                    <p class="feedback-para">Our trip to Dubai with {{ config('app.name') }}
                                                        exceeded all expectations. The personalized attention to detail and
                                                        the seamless organization of our itinerary made our vacation truly
                                                        special. We'll cherish the memories of exploring the Dubai Marina
                                                        and enjoying the thrilling rides at IMG Worlds of Adventure forever.
                                                    </p>
                                                </div>
                                                <div class="feedback-review mt-4">
                                                    <img src="/frontend/assets/images/c3.jpg" class="img-fluid"
                                                        alt="">
                                                    <h5>Laura Sten</h5>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="customer-info text-center">
                                                <div class="feedback-hny">
                                                    <span class="fa fa-quote-left"></span>
                                                    <p class="feedback-para">Dubai was a dream destination for us, and {{ config('app.name') }} helped turn that dream into reality. From the
                                                        exhilarating experiences at the Dubai Mall to the tranquil ambiance
                                                        of Jumeirah Beach, every aspect of our trip was meticulously planned
                                                        and executed. Thank you for the unforgettable memories!</p>
                                                </div>
                                                <div class="feedback-review mt-4">
                                                    <img src="/frontend/assets/images/c4.jpg" class="img-fluid"
                                                        alt="">
                                                    <h5>John Lee</h5>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--.row-->
                                </div>
                                <!--.item-->

                                <div class="carousel-item">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="customer-info text-center">
                                                <div class="feedback-hny">
                                                    <span class="fa fa-quote-left"></span>
                                                    <p class="feedback-para">Dubai exceeded our expectations, and {{ config('app.name') }} played a significant role in making it happen. From
                                                        the adrenaline-pumping experiences at Ski Dubai to the awe-inspiring
                                                        views from the Dubai Frame, every moment was filled with excitement
                                                        and wonder. We highly recommend {{ config('app.name') }} for anyone
                                                        planning a trip to Dubai!</p>
                                                </div>
                                                <div class="feedback-review mt-4">
                                                    <img src="/frontend/assets/images/c4.jpg" class="img-fluid"
                                                        alt="">
                                                    <h5>John Lee</h5>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="customer-info text-center">
                                                <div class="feedback-hny">
                                                    <span class="fa fa-quote-left"></span>
                                                    <p class="feedback-para">Our experience with {{ config('app.name') }} in
                                                        Dubai was nothing short of spectacular. From the mesmerizing
                                                        fountain show at the Dubai Mall to the sumptuous dining experiences
                                                        in Downtown Dubai, every detail was meticulously planned, ensuring a
                                                        memorable vacation. Thank you for the exceptional service!</p>
                                                </div>
                                                <div class="feedback-review mt-4">
                                                    <img src="/frontend/assets/images/c3.jpg" class="img-fluid"
                                                        alt="">
                                                    <h5>Laura Sten</h5>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="customer-info text-center">
                                                <div class="feedback-hny">
                                                    <span class="fa fa-quote-left"></span>
                                                    <p class="feedback-para">Dubai was a magical destination, and {{ config('app.name') }} made our experience truly unforgettable. From the
                                                        adrenaline rush at Ferrari World to the luxurious yacht cruise along
                                                        the Dubai Marina, every moment was filled with excitement and joy.
                                                        Thank you for the fantastic memories!</p>
                                                </div>
                                                <div class="feedback-review mt-4">
                                                    <img src="/frontend/assets/images/c1.jpg" class="img-fluid"
                                                        alt="">
                                                    <h5>Smith Roy</h5>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="customer-info text-center">
                                                <div class="feedback-hny">
                                                    <span class="fa fa-quote-left"></span>
                                                    <p class="feedback-para">Our trip to Dubai organized by {{ config('app.name') }} was an absolute delight. From the exhilarating dune bashing
                                                        experience in the desert to the exquisite dining options at Madinat
                                                        Jumeirah, every moment was filled with adventure and luxury. We
                                                        can't wait to plan our next vacation with {{ config('app.name') }}!</p>
                                                </div>
                                                <div class="feedback-review mt-4">
                                                    <img src="/frontend/assets/images/c2.jpg" class="img-fluid"
                                                        alt="">
                                                    <h5>Lora Grill</h5>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--.row-->
                                </div>
                                <!--.item-->

                            </div>
                            <!--.carousel-inner-->
                        </div>
                        <!--.Carousel-->

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- //customers-->
    <section class="w3l-subscription-6">
        <!--/customers -->
        <div class="subscription-infhny">
            <div class="container-fluid">

                <div class="subscription-grids row">

                    <div class="subscription-right form-right-inf col-lg-6 p-md-5 p-4">
                        <div class="p-lg-5 py-md-0 py-3">
                            <h3 class="hny-title">Join us for FREE to get instant <span>email updates!</span></h3>
                            <p>Subscribe and get notified at first on the latest update and offers!</p>
                            <h1 id="newsletter_email" style="display: none;"><span class="lohny">Thankyou</span></h1>
                            <form action="#" method="post" class="signin-form mt-lg-5 mt-4">
                                @csrf
                                <div class="forms-gds">
                                    <div class="form-input">
                                        <input type="email" name="" placeholder="Your email here"
                                            required="">
                                    </div>
                                    <div class="form-input"><button type="button" onclick="newsletter()" class="btn">Join</button></div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="subscription-left forms-25-info col-lg-6 ">

                    </div>
                </div>

                <!--//customers -->
            </div>
    </section>
    <!-- //customers-6-->
@endsection
