@extends('frontend.layouts.app')

@section('title', 'Home Page')

@section('content')

<nav aria-label="breadcrumb" class="breadcrumb-wrapper">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">About</li>
        </ol>
    </div>
</nav>

<main id="content" class="main-content-wrapper overflow-hidden">
    <div class="about-area ">
        <div class="container-fluid p-0">
            <div class="row g-0 align-items-center">
                <div class="col-lg-6">
                    <div class="img-box text-center">
                        <img src="https://m.media-amazon.com/images/I/61Tqxv6hZ8L._AC_SX679_.jpg" alt="about">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-10 offset-1">
                            <div class="about-text text-center">
                                <h2 class="heading-secondary text-uppercase">
                                    <strong>About us</strong>
                                </h2>
                                <p class="mb--40 mb-sm--30">
                                    Welcome to <span class="lohny"><b>{{ config('app.name') }}</b></span>, where we specialize in crafting personalized travel experiences that surpass expectations. With a passion for exploration and a commitment to excellence, our dedicated team works tirelessly to curate bespoke itineraries tailored to your preferences. From exhilarating adventures to luxurious retreats and immersive cultural encounters, we offer a diverse array of destinations and experiences to suit every traveler's tastes. With our attention to detail and unwavering dedication to customer satisfaction, we ensure that every moment of your journey is seamless and memorable. Whether you're seeking iconic landmarks or hidden gems off the beaten path, we have the expertise and resources to make it happen. Join us on a journey of discovery and embark on the adventure of a lifetime with {{ config('app.name') }}.
                                </p>
                                <div class="about-btn">
                                    {{-- <a href="portfolio.html" class="btn btn-outlined--black">view work</a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="fact-area d-none">
        <div class="container-fluid p-0">
            <div class="row g-0">
                <div class="col-lg-3 col-sm-6">
                    <div class="fact">
                        <div class="fact__icon">
                            <img src="assets/images/others/about-us-icon1.webp" alt="about icon">
                        </div>
                        <div class="fact__content">
                            <h3>
                                <span class="counter">100</span>
                            </h3>
                            <p class="text-uppercase">Professionals</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="fact">
                        <div class="fact__icon">
                            <img src="assets/images/others/about-us-icon3.png" alt="about icon">
                        </div>
                        <div class="fact__content">
                            <h3>
                                <span class="counter">100</span>
                            </h3>
                            <p class="text-uppercase">Adopted Pets</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="fact">
                        <div class="fact__icon">
                            <img src="assets/images/others/about-us-icon2.webp" alt="about icon">
                        </div>
                        <div class="fact__content">
                            <h3>
                                <span class="counter">100</span>
                            </h3>
                            <p class="text-uppercase">Awards</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="fact">
                        <div class="fact__icon">
                            <img src="assets/images/others/about-us-icon4.webp" alt="about icon">
                        </div>
                        <div class="fact__content">
                            <h3>
                                <span class="counter">100</span>
                            </h3>
                            <p class="text-uppercase">Clients</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="skill-area bg--white">
        <!-- <div class="container-fluid p-0">
            <div class="row g-0 align-items-center">
                <div class="col-xl-6">
                    <div class="row">
                        <div class="col-sm-9 offset-sm-2 col-10 offset-1">
                            <div class="skill-progress">
                                <h2 class="heading-secondary heading-secondary--2 mb--40"> WE HAVE SKILLS TO SHOW </h2>
                                <div class="skill-progress__single">
                                    <span class="skill-progress__title">html/css</span>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">
                                            <span>90%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="skill-progress__single">
                                    <span class="skill-progress__title">wordpress</span>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: 85%;" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                                            <span>85%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="skill-progress__single">
                                    <span class="skill-progress__title">typhography</span>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: 70%;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">
                                        <span>70%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="skill-progress__single">
                                    <span class="skill-progress__title">branding</span>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: 95%;" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100">
                                            <span>95%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="img-box text-center">
                        <img src="assets/images/others/about-us-sec-2.jpg" alt="about image">
                    </div>
                </div>
            </div>
        </div> -->
        <div class="pt--50 pb--50 d-none">
            <div class="container">
                <div class="petmark-slick-slider brand-slider  border normal-slider grid-border-none" data-slick-setting='{
                        "autoplay": true,
                        "autoplaySpeed": 3000,
                        "slidesToShow": 5,
                        "infinite": true,
                        "arrows": true
                    }'
                    data-slick-responsive='[
                        {"breakpoint":991, "settings": {"slidesToShow": 4} },
                        {"breakpoint":768, "settings": {"slidesToShow": 3} },
                        {"breakpoint":480, "settings": {"slidesToShow": 2} },
                        {"breakpoint":320, "settings": {"slidesToShow": 1} }
                    ]'>

                    <div class="single-slide">
                        <a href="#" class="overflow-image brand-image">
                            <img src="assets/images/brand/brand.webp" alt="">
                        </a>
                    </div>
                    <div class="single-slide">
                        <a href="#" class="overflow-image brand-image">
                            <img src="assets/images/brand/brand-2.webp" alt="">
                        </a>
                    </div>
                    <div class="single-slide">
                        <a href="#" class="overflow-image brand-image">
                            <img src="assets/images/brand/brand-3.webp" alt="">
                        </a>
                    </div>
                    <div class="single-slide">
                        <a href="#" class="overflow-image brand-image">
                            <img src="assets/images/brand/brand-4.webp" alt="">
                        </a>
                    </div>
                    <div class="single-slide">
                        <a href="#" class="overflow-image brand-image">
                            <img src="assets/images/brand/brand-5.webp" alt="">
                        </a>
                    </div>
                    <div class="single-slide">
                        <a href="#" class="overflow-image brand-image">
                            <img src="assets/images/brand/brand-6.webp" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection

