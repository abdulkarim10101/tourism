@extends('frontend.layouts.app')
@section('content')
    <!-- ========== MAIN CONTENT ========== -->
    <main id="content" role="main">
        <!-- Slider Section -->
        <div class="mb-4">
            <div class="bg-img-hero" style="background-image: url({{ asset('images') }}/home/bg-back.jpg);">
                <div class="container min-height-438 overflow-hidden">
                    <div class="js-slick-carousel u-slick"
                        data-pagi-classes="text-center position-absolute right-0 bottom-0 left-0 u-slick__pagination u-slick__pagination--long justify-content-start mb-3 mb-md-4 offset-xl-2 pl-xl-16 pl-wd-13">
                        <div class="js-slide">
                            <div class="row min-height-438 pt-7 py-md-0">
                                <div class="d-none d-xl-block col-auto">
                                    <div class="max-width-270 min-width-270"></div>
                                </div>
                                <div class="col-xl col col-md-6 mt-md-8 mt-lg-10">
                                    <div class="ml-xl-4">
                                        <h6 class="font-size-15 font-weight-bold mb-2 text-cyan"
                                            data-scs-animation-in="fadeInUp">
                                            SHOP TO GET WHAT YOU LOVE
                                        </h6>
                                        <h1 class="font-size-46 text-lh-50 font-weight-light mb-6"
                                            data-scs-animation-in="fadeInUp" data-scs-animation-delay="200">
                                            TIMEPIECES THAT MAKE A STATEMENT UP TO <stong class="font-weight-bold">40% OFF
                                            </stong>
                                        </h1>
                                        <a href="{{ route('shop.shop') }}"
                                            class="btn btn-primary transition-3d-hover rounded-lg font-weight-normal py-2 px-md-7 px-3 font-size-16"
                                            <a href="{{ route('shop.shop') }}"
                                            class="btn btn-primary transition-3d-hover rounded-lg  py-2 px-md-7 px-3 font-size-16"
                                            data-scs-animation-in="fadeInUp" data-scs-animation-delay="300">
                                            Start Buying
                                        </a>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-6 d-flex align-items-center ml-auto ml-md-0"
                                    data-scs-animation-in="fadeInUp" data-scs-animation-delay="500">
                                    <img class="img-fluid ml-auto mr-5" src="{{ asset('images') }}/home/screen.png"
                                        alt="Image Description">
                                </div>
                            </div>
                        </div>
                        <div class="js-slide">
                            <div class="row min-height-438 pt-7 py-md-0">
                                <div class="d-none d-xl-block col-auto">
                                    <div class="max-width-270 min-width-270"></div>
                                </div>
                                <div class="col-xl col col-md-6 mt-md-8 mt-lg-10">
                                    <div class="ml-xl-4">
                                        <h6 class="font-size-15 font-weight-bold mb-2 text-cyan"
                                            data-scs-animation-in="fadeInUp">
                                            SHOP TO GET WHAT YOU LOVE
                                        </h6>
                                        <h1 class="font-size-46 text-lh-50 font-weight-light mb-6"
                                            data-scs-animation-in="fadeInUp" data-scs-animation-delay="200">
                                            TIMEPIECES THAT MAKE A STATEMENT UP TO <stong class="font-weight-bold">40% OFF
                                            </stong>
                                        </h1>
                                        <a href="{{ route('shop.shop') }}"
                                            class="btn btn-primary transition-3d-hover rounded-lg font-weight-normal py-2 px-md-7 px-3 font-size-16"
                                            <a href="{{ route('shop.shop') }}"
                                            class="btn btn-primary transition-3d-hover rounded-lg  py-2 px-md-7 px-3 font-size-16"
                                            data-scs-animation-in="fadeInUp" data-scs-animation-delay="300">
                                            Start Buying
                                        </a>
                                    </div>
                                </div>


                                {{-- <div class="col-xl-5 col-6 flex-horizontal-center ml-auto ml-md-0" --}}
                                <div class="col-xl-5 col-6 flex-horizontal-center ml-auto ml-md-0"
                                    data-scs-animation-in="fadeInRight" data-scs-animation-delay="500">
                                    <img class="img-fluid ml-auto mr-5 " src="{{ asset('images') }}/home/screen.png"
                                        alt="Image Description">
                                </div>
                            </div>
                        </div>
                        <div class="js-slide">
                            <div class="row min-height-438 pt-7 py-md-0">
                                <div class="d-none d-xl-block col-auto">
                                    <div class="max-width-270 min-width-270"></div>
                                </div>
                                <div class="col-xl col col-md-6 mt-md-8 mt-lg-10">
                                    <div class="ml-xl-4">
                                        <h6 class="font-size-15 font-weight-bold mb-2 text-cyan"
                                            data-scs-animation-in="fadeInUp">
                                            SHOP TO GET WHAT YOU LOVE
                                        </h6>
                                        <h1 class="font-size-46 text-lh-50 font-weight-light mb-6"
                                            data-scs-animation-in="fadeInUp" data-scs-animation-delay="200">
                                            TIMEPIECES THAT MAKE A STATEMENT UP TO <stong class="font-weight-bold">40% OFF
                                            </stong>
                                        </h1>
                                        <a href="{{ route('shop.shop') }}"
                                            class="btn btn-primary transition-3d-hover rounded-lg font-weight-normal py-2 px-md-7 px-3 font-size-16"
                                            data-scs-animation-in="fadeInUp" data-scs-animation-delay="300">
                                            Start Buying
                                        </a>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-6 flex-horizontal-center ml-auto ml-md-0"
                                    data-scs-animation-in="fadeInRight" data-scs-animation-delay="500">
                                    <img class="img-fluid ml-auto mr-5 " src="{{ asset('images') }}/home/screen.png"
                                        alt="Image Description">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Slider Section -->
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-wd-auto d-none d-xl-block">
                    <div class="max-width-270 min-width-270">

                        <aside class="mb-4">
                            <a href="https://altechdevices.com/shop/product/Intel-CM8067702868115-Intel-Processors">
                            <div class="sidebannernew">
                                <div class="imagebox">
                                    <img src="{{ asset('images') }}/home/sidebanner.jpg" />
                                </div>
                            </div>
                        </a>
                            <!-- Wrapper Latest Products -->
                            {{-- <div class="mb-2 position-relative">
                                <dv
                                    class="d-flex justify-content-between border-bottom border-color-1 flex-md-nowrap flex-wrap border-sm-bottom-0">
                                    <h3 class="section-title section-title__sm mb-0 pb-3 font-size-18">Latest Products</h3>
                                </dv>
                                <div class="js-slick-carousel u-slick u-slick--gutters-2 overflow-hidden u-slick-overflow-visble pt-3 position-static"
                                    data-slides-show="1" data-slides-scroll="1"
                                    data-arrows-classes="position-absolute top-0 font-size-17 u-slick__arrow-normal top-10"
                                    data-arrow-left-classes="fa fa-angle-left right-1"
                                    data-arrow-right-classes="fa fa-angle-right right-0">
                                    <div class="js-slide">
                                        <ul class="list-unstyled products-group mb-0 overflow-visible">
                                            @include('shop.home_latest_products')

                                        </ul>
                                    </div>

                                </div>
                            </div> --}}
                            <!-- End Wrapper Latest Products -->
                        </aside>
                        <!-- End Latest Products -->


                    </div>
                </div>
                <div class="col-xl-9 col-wd-auto max-width-1130">
                    <!-- Banner -->
                    {{-- <div class="row mb-6">
                        <div class="col-md-6 mb-4 mb-xl-0 col-wd-4">
                            <a href="{{route('shop.shop')}}" class="d-black text-gray-90">
                                <div class="min-height-166 py-1 py-xl-2 py-wd-4 d-flex bg-gray-1 align-items-center">
                                    <div class="col-6 col-xl-7 col-wd-6 pr-0">
                                        <img class="img-fluid" src="{{asset('shops')}}/assets/img/246X176/img1.jpg"
                                            alt="Image Description">
                                    </div>
                                    <div class="col-6 col-xl-5 col-wd-6 pr-xl-4 pr-wd-3">
                                        <div class="mb-2 pb-1 font-size-18 font-weight-light text-ls-n1 text-lh-23">
                                            CATCH BIG <strong>DEALS</strong> ON THE CAMERAS
                                        </div>
                                        <div class="link text-gray-90 font-weight-bold font-size-15" href="#">
                                            Shop now
                                            <span class="link__icon ml-1">
                                                <span class="link__icon-inner"><i
                                                        class="ec ec-arrow-right-categproes"></i></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6 mb-4 mb-xl-0 col-wd-4">
                            <a href="{{route('shop.shop')}}" class="d-black text-gray-90">
                                <div class="min-height-166 py-1 py-xl-2 py-wd-4 d-flex bg-gray-1 align-items-center">
                                    <div class="col-6 col-xl-7 col-wd-6 pr-0">
                                        <img class="img-fluid" src="{{asset('shops')}}/assets/img/246X176/img2.jpg"
                                            alt="Image Description">
                                    </div>
                                    <div class="col-6 col-xl-5 col-wd-6 pr-xl-4 pr-wd-3">
                                        <div class="mb-2 pb-1 font-size-18 font-weight-light text-ls-n1 text-lh-23">
                                            CATCH BIG <strong>DEALS</strong> ON THE CAMERAS
                                        </div>
                                        <div class="link text-gray-90 font-weight-bold font-size-15" href="#">
                                            Shop now
                                            <span class="link__icon ml-1">
                                                <span class="link__icon-inner"><i
                                                        class="ec ec-arrow-right-categproes"></i></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6 mb-4 mb-xl-0 col-wd-4 d-md-none d-wd-block">
                            <a href="{{route('shop.shop')}}" class="d-black text-gray-90">
                                <div class="min-height-166 py-1 py-xl-2 py-wd-4 d-flex bg-gray-1 align-items-center">
                                    <div class="col-6 col-xl-7 col-wd-6 pr-0">
                                        <img class="img-fluid" src="{{asset('shops')}}/assets/img/246X176/img3.jpg"
                                            alt="Image Description">
                                    </div>
                                    <div class="col-6 col-xl-5 col-wd-6 pr-xl-4 pr-wd-3">
                                        <div class="mb-2 pb-1 font-size-18 font-weight-light text-ls-n1 text-lh-23">
                                            CATCH BIG <strong>DEALS</strong> ON THE CAMERAS
                                        </div>
                                        <div class="link text-gray-90 font-weight-bold font-size-15" href="#">
                                            Shop now
                                            <span class="link__icon ml-1">
                                                <span class="link__icon-inner"><i
                                                        class="ec ec-arrow-right-categproes"></i></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div> --}}
                    <!-- End Banner -->



                    <!-- End Full banner -->

                    <!-- Smartphones -->
                    @foreach ($featuredcategories as $item)

                        <div class="position-relative">
                            <div class="border-bottom border-color-1 mb-2">
                                <h3 class="section-title mb-0 pb-2 font-size-22">{{ $item->name }}</h3>
                            </div>


                            <div class="container-slick arrowscustoms row">
                                @include('shop.home_products')

                            </div>


                        </div>
                    @endforeach

                    <div class="position-relative">
                        <div class="border-bottom border-color-1 mb-2">
                            <h3 class="section-title mb-0 pb-2 font-size-22">Featured Products</h3>
                        </div>


                        <div class="container-slick arrowscustoms row">
                            @include('shop.home_featured_products')

                        </div>


                    </div>

                </div>
            </div>
        </div>

    </main>
    <!-- ========== END MAIN CONTENT ========== -->
@endsection
