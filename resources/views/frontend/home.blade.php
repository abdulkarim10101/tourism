@extends('frontend.layouts.app')

@section('meta')
<meta property="og:image" content="https://www.giftoliaa.com/image/giftoliaasquare_gImNu_.jpeg">
@endsection


@section('content')
    <!-- Your home page specific HTML content here -->

    <section class="home-slider-3">
        <div class="container">
            <div class=" petmark-slick-slider  home-slider" data-slick-setting='{
                    "autoplay": true,
                    "autoplaySpeed": 8000,
                    "slidesToShow": 1,
                    "dots": true
                }'>
                <div class="single-slider home-content bg-image" data-bg="{{asset('giftoliaa/assets/images/bg-images/banner1.png')}}">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2>{{ config('app.name') }}</h2>
                            <p>Travel With Style</p>
                            <div class="slider-btn mt--30">
                                <a href="/shop" class="btn btn-outlined--orange btn-rounded">Shop Now</a>
                            </div>
                        </div>
                    </div>
                    <span class="herobanner-progress"></span>
                </div>
                {{-- <div class="single-slider home-content bg-image" data-bg="{{asset('giftoliaa/assets/images/bg-images/banner2.png')}}">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2>Cat Bowls & <br> Cat Fountains</h2>
                            <h4 class="mt--20">Shop Online For Cat feeding and & Watering Supplies </h4>
                            <div class="slider-btn mt--30">
                                <a href="/shop" class="btn btn-outlined--orange btn-rounded">Shop Now</a>
                            </div>
                        </div>
                    </div>
                    <span class="herobanner-progress"></span>
                </div> --}}
            </div>
        </div>
    </section>

    <!-- Home-2 => Promotion Block 1 -->
    {{-- <section class="pt--50 space-db--30">
        <h2 class="d-none">Promotion Block</h2>
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <a class="promo-image overflow-image">
                            <img src="{{asset('giftoliaa/assets/images/product/promo-product-image-1--home-3.webp')}}" alt="">
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a class="promo-image overflow-image">
                            <img src="{{asset('giftoliaa/assets/images/product/promo-product-image-2--home-3.webp')}}" alt="">
                        </a>

                    </div>
                    <div class="col-md-4">
                        <a class="promo-image overflow-image">
                            <img src="{{asset('giftoliaa/assets/images/product/promo-product-image-3--home-3.webp')}}" alt="">
                        </a>
                    </div>
                </div>
            </div>
    </section> --}}

    <!-- Slider One / Normal Two Column Slider -->
    {{-- <section class="pt--50">
        <div class="container">
            <div class="block-title-3">
                <h2>Featured Products</h2>
            </div>
            <div class="petmark-slick-slider border normal-two-column-slider"
                data-slick-setting='{
                    "autoplaySpeed": 3000,
                    "slidesToShow": 2,
                    "infinite": true,
                    "arrows": true
                }'
                data-slick-responsive='[
                    {"breakpoint":991, "settings": {"slidesToShow": 1} },
                    {"breakpoint":575, "settings": {"slidesToShow": 1} }
                ]'>
                <div class="single-slide">
                    <div class="pm-product product-type-list">
                        <a href="product-details.php" class="image">
                            <img src="{{asset('giftoliaa/assets/images/product/home-3/product-1.webp')}}" alt="">
                        </a>
                        <div class="content">
                        <h3 class="font-weight-500">Convallis quam sit</h3>
                            <div class="price text-orange mb-3" >
                                <span class="old">$200</span>
                                <span>$300</span>
                            </div>
                            <p >Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor.</p>
                            <div class="count-down-block">
                                <div class="product-countdown" data-countdown="2023/12/12"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-slide">
                    <div class="pm-product product-type-list">
                        <a href="product-details.php" class="image">
                            <img src="{{asset('giftoliaa/assets/images/product/home-3/product-2.webp')}}" alt="">
                        </a>
                        <div class="content">
                        <h3 class="font-weight-500">Convallis quam sit</h3>
                            <div class="price text-orange mb-3" >
                                <span class="old">$200</span>
                                <span>$300</span>
                            </div>
                            <p >Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor.</p>
                            <div class="count-down-block">
                                <div class="product-countdown" data-countdown="2023/12/12"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-slide">
                    <div class="pm-product product-type-list">
                        <a href="product-details.php" class="image">
                            <img src="{{asset('giftoliaa/assets/images/product/home-3/product-3.webp')}}" alt="">
                        </a>
                        <div class="content">
                        <h3 class="font-weight-500">Convallis quam sit</h3>
                            <div class="price text-orange mb-3" >
                                <span class="old">$200</span>
                                <span>$300</span>
                            </div>
                            <p >Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor.</p>
                            <div class="count-down-block">
                                <div class="product-countdown" data-countdown="2023/12/12"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-slide">
                    <div class="pm-product product-type-list">
                        <a href="product-details.php" class="image">
                            <img src="{{asset('giftoliaa/assets/images/product/home-3/product-4.webp')}}" alt="">
                        </a>
                        <div class="content">
                        <h3 class="font-weight-500">Convallis quam sit</h3>
                            <div class="price text-orange mb-3" >
                                <span class="old">$200</span>
                                <span>$300</span>
                            </div>
                            <p >Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor.</p>
                            <div class="count-down-block">
                                <div class="product-countdown" data-countdown="2023/12/12"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <!-- Home => 3 -> Slider block 2 -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 pt--50 order-lg-2">
                    <div class="slider-main-block">
                        <!-- Tab Slider -->
                        <div class="single-main-block">
                            @foreach ($categories as $category)
                                <<div class="slider-header-block slider-header-block tab-header d-flex border-bottom-green">
                                    <div class="block-title-3 mb-0 border-0">
                                        <h2>{{ $category->name }}</h2> <!-- Dynamic category name -->
                                    </div>
                                    <div class="ml-auto"> <!-- Add ml-auto class to align content to the right -->
                                        <a class="viewall" href="{{ route('shop.productbycategory', $category->slug) }}">
                                            <i class="fas fa-arrow-right mr-1"></i> <!-- FontAwesome arrow icon -->
                                            View All
                                        </a>
                                    </div>
                                </div>

                                <div class="tab-content pm-slider-tab-content" id="myTabContent{{ $category->id }}">
                                    <div class="tab-pane fade show active" id="home{{ $category->id }}" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="petmark-slick-slider petmark-slick-slider--wrapper-2 border grid-column-slider arrow-type-two"
                                             data-slick-setting='{
                                                    "autoplay": true,
                                                    "autoplaySpeed": 3000,
                                                    "slidesToShow": 4,
                                                    "rows" :2,
                                                    "infinite": true,
                                                    "arrows": true
                                                 }'
                                             data-slick-responsive='[
                                                    {"breakpoint":991, "settings": {"slidesToShow": 3} },
                                                    {"breakpoint":768, "settings": {"slidesToShow": 2} },
                                                    {"breakpoint":480, "settings": {"slidesToShow": 1,"rows" :1} }
                                                 ]'>

                                            @foreach ($category->products as $product) <!-- Loop through products -->
                                                <div class="single-slide">
                                                    <div class="pm-product">
                                                        <div class="image">
                                                            <a href="{{route('shop.productdetail',$product->slug)}}">
                                                                <img src="{{$product->images->first() ? $product->images->first()->images : 'null'}}" alt="{{ $product->name }}">
                                                            </a>
                                                            <div class="hover-conents">
                                                                <ul class="product-btns">
                                                                    <li><a onclick="addToWishlist(this,{{ $product->id }})" tabindex="0" @if ($product->addedToWishlist()) class="red" @endif><i class="fas fa-heart"></i></a></li>

                                                                </ul>
                                                            </div>
                                                            @if($product->is_on_sale)
                                                                <span class="onsale-badge">Sale!</span>
                                                            @endif
                                                        </div>
                                                        <div class="content">
                                                            <h3><a href="product-details.php">{{ $product->name }}</a></h3>
                                                            <div class="price text-orange">
                                                                @if($product->discount_price)
                                                                    <span class="old">AED {{ $product->original_price }}</span>
                                                                @endif
                                                                <span>AED {{ $product->price }}</span>
                                                            </div>
                                                            <div class="btn-block">
                                                                <a onclick="addToCart({{ $product->id }})" href="#" class="btn btn-outlined btn-rounded">Add to Cart</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <!-- Pagination Links -->
                            {{-- <div class="pagination-wrapper">
                                {{ $categories->links() }}
                            </div> --}}
                        </div>


                        {{-- <div class="single-main-block">
                            <!-- Home =>  Promotion Block 2 -->
                            <a class="promo-image overflow-image">
                                <img src="{{asset('giftoliaa/assets/images/product/promo-product-image-big--home-3.webp')}}" alt="">
                            </a>
                        </div> --}}
                        {{-- <div class="single-main-block">
                            <div class="block-title-3">
                                <h2>Accessories</h2>
                            </div>
                            <div class="petmark-slick-slider border grid-column-slider" data-slick-setting='{
                                    "autoplay": true,
                                    "autoplaySpeed": 3000,
                                    "slidesToShow": 4,
                                    "rows" :2,
                                    "arrows": true
                                }'
                                data-slick-responsive='[
                                    {"breakpoint":991, "settings": {"slidesToShow": 3} },
                                    {"breakpoint":768, "settings": {"slidesToShow": 2} },
                                    {"breakpoint":480, "settings": {"slidesToShow": 1,"rows" :1} }
                                ]'>

                                <div class="single-slide">
                                    <div class="pm-product">
                                        <div class="image">
                                            <a href="product-details.php"><img src="{{asset('giftoliaa/assets/images/product/home-2/product-1.webp')}}" alt=""></a>
                                            <div class="hover-conents">
                                                <ul class="product-btns">
                                                    <li><a href="wishlist.php"><i class="fas fa-heart"></i></a></li>
                                                    <li><a href="javascript:;" data-bs-toggle="modal" data-bs-target="#quickModal"><i class="fas fa-search"></i></a></li>
                                                </ul>
                                            </div>
                                            <span class="onsale-badge">Sale!</span>
                                        </div>
                                        <div class="content">
                                            <h3> <a href="product-details.php"> Convallis quam sit </a></h3>
                                            <div class="price text-orange">
                                                <span class="old">$200</span>
                                                <span>$300</span>
                                            </div>
                                            <div class="btn-block">
                                                <a href="cart.php" class="btn btn-outlined btn-rounded">Add to Cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-slide">
                                    <div class="pm-product">
                                        <div class="image">
                                            <a href="product-details.php"><img src="{{asset('giftoliaa/assets/images/product/home-2/product-2.webp')}}" alt=""></a>
                                            <div class="hover-conents">
                                                <ul class="product-btns">
                                                    <li><a href="wishlist.php"><i class="fas fa-heart"></i></a></li>
                                                    <li><a href="javascript:;" data-bs-toggle="modal" data-bs-target="#quickModal"><i class="fas fa-search"></i></a></li>
                                                </ul>
                                            </div>
                                            <span class="onsale-badge">Sale!</span>
                                        </div>
                                        <div class="content">
                                            <h3> <a href="product-details.php"> Convallis quam sit </a></h3>
                                            <div class="price text-orange">
                                                <span class="old">$200</span>
                                                <span>$300</span>
                                            </div>
                                            <div class="btn-block">
                                                <a href="cart.php" class="btn btn-outlined btn-rounded">Add to Cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-slide">
                                    <div class="pm-product">
                                        <div class="image">
                                            <a href="product-details.php"><img src="{{asset('giftoliaa/assets/images/product/home-2/product-3.webp')}}" alt=""></a>
                                            <div class="hover-conents">
                                                <ul class="product-btns">
                                                    <li><a href="wishlist.php"><i class="fas fa-heart"></i></a></li>
                                                    <li><a href="javascript:;" data-bs-toggle="modal" data-bs-target="#quickModal"><i class="fas fa-search"></i></a></li>
                                                </ul>
                                            </div>
                                            <span class="onsale-badge">Sale!</span>
                                        </div>
                                        <div class="content">
                                            <h3> <a href="product-details.php"> Convallis quam sit </a></h3>
                                            <div class="price text-orange">
                                                <span class="old">$200</span>
                                                <span>$300</span>
                                            </div>
                                            <div class="btn-block">
                                                <a href="cart.php" class="btn btn-outlined btn-rounded">Add to Cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-slide">
                                    <div class="pm-product">
                                        <div class="image">
                                            <a href="product-details.php"><img src="{{asset('giftoliaa/assets/images/product/home-2/product-4.webp')}}" alt=""></a>
                                            <div class="hover-conents">
                                                <ul class="product-btns">
                                                    <li><a href="wishlist.php"><i class="fas fa-heart"></i></a></li>
                                                    <li><a href="javascript:;" data-bs-toggle="modal" data-bs-target="#quickModal"><i class="fas fa-search"></i></a></li>
                                                </ul>
                                            </div>
                                            <span class="onsale-badge">Sale!</span>
                                        </div>
                                        <div class="content">
                                            <h3> <a href="product-details.php"> Convallis quam sit </a></h3>
                                            <div class="price text-orange">
                                                <span class="old">$200</span>
                                                <span>$300</span>
                                            </div>
                                            <div class="btn-block">
                                                <a href="cart.php" class="btn btn-outlined btn-rounded">Add to Cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-slide">
                                    <div class="pm-product">
                                        <div class="image">
                                            <a href="product-details.php"><img src="{{asset('giftoliaa/assets/images/product/home-2/product-5.webp')}}" alt=""></a>
                                            <div class="hover-conents">
                                                <ul class="product-btns">
                                                    <li><a href="wishlist.php"><i class="fas fa-heart"></i></a></li>
                                                    <li><a href="javascript:;" data-bs-toggle="modal" data-bs-target="#quickModal"><i class="fas fa-search"></i></a></li>
                                                </ul>
                                            </div>
                                            <span class="onsale-badge">Sale!</span>
                                        </div>
                                        <div class="content">
                                            <h3> <a href="product-details.php"> Convallis quam sit </a></h3>
                                            <div class="price text-orange">
                                                <span class="old">$200</span>
                                                <span>$300</span>
                                            </div>
                                            <div class="btn-block">
                                                <a href="cart.php" class="btn btn-outlined btn-rounded">Add to Cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-slide">
                                    <div class="pm-product">
                                        <div class="image">
                                            <a href="product-details.php"><img src="{{asset('giftoliaa/assets/images/product/home-2/product-6.webp')}}" alt=""></a>
                                            <div class="hover-conents">
                                                <ul class="product-btns">
                                                    <li><a href="wishlist.php"><i class="fas fa-heart"></i></a></li>
                                                    <li><a href="javascript:;" data-bs-toggle="modal" data-bs-target="#quickModal"><i class="fas fa-search"></i></a></li>
                                                </ul>
                                            </div>
                                            <span class="onsale-badge">Sale!</span>
                                        </div>
                                        <div class="content">
                                            <h3> <a href="product-details.php"> Convallis quam sit </a></h3>
                                            <div class="price text-orange">
                                                <span class="old">$200</span>
                                                <span>$300</span>
                                            </div>
                                            <div class="btn-block">
                                                <a href="cart.php" class="btn btn-outlined btn-rounded">Add to Cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-slide">
                                    <div class="pm-product">
                                        <div class="image">
                                            <a href="product-details.php"><img src="{{asset('giftoliaa/assets/images/product/home-2/product-8.webp')}}" alt=""></a>
                                            <div class="hover-conents">
                                                <ul class="product-btns">
                                                    <li><a href="wishlist.php"><i class="fas fa-heart"></i></a></li>
                                                    <li><a href="javascript:;" data-bs-toggle="modal" data-bs-target="#quickModal"><i class="fas fa-search"></i></a></li>
                                                </ul>
                                            </div>
                                            <span class="onsale-badge">Sale!</span>
                                        </div>
                                        <div class="content">
                                            <h3> <a href="product-details.php"> Convallis quam sit </a></h3>
                                            <div class="price text-orange">
                                                <span class="old">$200</span>
                                                <span>$300</span>
                                            </div>
                                            <div class="btn-block">
                                                <a href="cart.php" class="btn btn-outlined btn-rounded">Add to Cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-slide">
                                    <div class="pm-product">
                                        <div class="image">
                                            <a href="product-details.php"><img src="{{asset('giftoliaa/assets/images/product/home-2/product-10.webp')}}" alt=""></a>
                                            <div class="hover-conents">
                                                <ul class="product-btns">
                                                    <li><a href="wishlist.php"><i class="fas fa-heart"></i></a></li>
                                                    <li><a href="javascript:;" data-bs-toggle="modal" data-bs-target="#quickModal"><i class="fas fa-search"></i></a></li>
                                                </ul>
                                            </div>
                                            <span class="onsale-badge">Sale!</span>
                                        </div>
                                        <div class="content">
                                            <h3> <a href="product-details.php"> Convallis quam sit </a></h3>
                                            <div class="price text-orange">
                                                <span class="old">$200</span>
                                                <span>$300</span>
                                            </div>
                                            <div class="btn-block">
                                                <a href="cart.php" class="btn btn-outlined btn-rounded">Add to Cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-slide">
                                    <div class="pm-product">
                                        <div class="image">
                                            <a href="product-details.php"><img src="{{asset('giftoliaa/assets/images/product/home-2/product-5.webp')}}" alt=""></a>
                                            <div class="hover-conents">
                                                <ul class="product-btns">
                                                    <li><a href="wishlist.php"><i class="fas fa-heart"></i></a></li>
                                                    <li><a href="javascript:;" data-bs-toggle="modal" data-bs-target="#quickModal"><i class="fas fa-search"></i></a></li>
                                                </ul>
                                            </div>
                                            <span class="onsale-badge">Sale!</span>
                                        </div>
                                        <div class="content">
                                            <h3> <a href="product-details.php"> Convallis quam sit </a></h3>
                                            <div class="price text-orange">
                                                <span class="old">$200</span>
                                                <span>$300</span>
                                            </div>
                                            <div class="btn-block">
                                                <a href="cart.php" class="btn btn-outlined btn-rounded">Add to Cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-slide">
                                    <div class="pm-product">
                                        <div class="image">
                                            <a href="product-details.php"><img src="{{asset('giftoliaa/assets/images/product/home-2/product-4.webp')}}" alt=""></a>
                                            <div class="hover-conents">
                                                <ul class="product-btns">
                                                    <li><a href="wishlist.php"><i class="fas fa-heart"></i></a></li>
                                                    <li><a href="javascript:;" data-bs-toggle="modal" data-bs-target="#quickModal"><i class="fas fa-search"></i></a></li>
                                                </ul>
                                            </div>
                                            <span class="onsale-badge">Sale!</span>
                                        </div>
                                        <div class="content">
                                            <h3> <a href="product-details.php"> Convallis quam sit </a></h3>
                                            <div class="price text-orange">
                                                <span class="old">$200</span>
                                                <span>$300</span>
                                            </div>
                                            <div class="btn-block">
                                                <a href="cart.php" class="btn btn-outlined btn-rounded">Add to Cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-slide">
                                    <div class="pm-product">
                                        <div class="image">
                                            <a href="product-details.php"><img src="{{asset('giftoliaa/assets/images/product/home-2/product-2.webp')}}" alt=""></a>
                                            <div class="hover-conents">
                                                <ul class="product-btns">
                                                    <li><a href="wishlist.php"><i class="fas fa-heart"></i></a></li>
                                                    <li><a href="javascript:;" data-bs-toggle="modal" data-bs-target="#quickModal"><i class="fas fa-search"></i></a></li>
                                                </ul>
                                            </div>
                                            <span class="onsale-badge">Sale!</span>
                                        </div>
                                        <div class="content">
                                            <h3> <a href="product-details.php"> Convallis quam sit </a></h3>
                                            <div class="price text-orange">
                                                <span class="old">$200</span>
                                                <span>$300</span>
                                            </div>
                                            <div class="btn-block">
                                                <a href="cart.php" class="btn btn-outlined btn-rounded">Add to Cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-slide">
                                    <div class="pm-product">
                                        <div class="image">
                                            <a href="product-details.php"><img src="{{asset('giftoliaa/assets/images/product/home-2/product-1.webp')}}" alt=""></a>
                                            <div class="hover-conents">
                                                <ul class="product-btns">
                                                    <li><a href="wishlist.php"><i class="fas fa-heart"></i></a></li>
                                                    <li><a href="javascript:;" data-bs-toggle="modal" data-bs-target="#quickModal"><i class="fas fa-search"></i></a></li>
                                                </ul>
                                            </div>
                                            <span class="onsale-badge">Sale!</span>
                                        </div>
                                        <div class="content">
                                            <h3> <a href="product-details.php"> Convallis quam sit </a></h3>
                                            <div class="price text-orange">
                                                <span class="old">$200</span>
                                                <span>$300</span>
                                            </div>
                                            <div class="btn-block">
                                                <a href="cart.php" class="btn btn-outlined btn-rounded">Add to Cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
                {{-- <div class="col-lg-3 order-lg-1 pt--50">
                    <div class="slider-side-block">
                        <div class="single-slide-block">
                            <div class="block-title-3">
                                <h2>Best Sellers</h2>
                            </div>
                            <div class="petmark-slick-slider border one-column-slider three-row sidebar-one-column" data-slick-setting='{
                                    "autoplaySpeed": 3000,
                                    "slidesToShow": 1,
                                    "rows" :3,
                                    "infinite": true,
                                    "arrows": true
                                }'
                                data-slick-responsive='[
                                    {"breakpoint":991, "settings": {"slidesToShow": 1} },
                                    {"breakpoint":575, "settings": {"slidesToShow": 1} }
                                ]'>
                                <div class="single-slide">
                                    <div class="pm-product product-type-list">
                                        <a href="product-details.php" class="image">
                                            <img src="{{asset('giftoliaa/assets/images/product/home-3/product-6.webp')}}" alt="">
                                        </a>
                                        <div class="content">
                                            <h3> <a href="product-details.php"> Convallis quam sit </a></h3>
                                            <div class="price text-orange">
                                                <span class="old">$200</span>
                                                <span>$300</span>
                                            </div>
                                            <div class="rating-widget mt--20">
                                                <span class="single-rating"><i class="fas fa-star"></i></span>
                                                <span class="single-rating"><i class="fas fa-star"></i></span>
                                                <span class="single-rating"><i class="fas fa-star"></i></span>
                                                <span class="single-rating"><i class="fas fa-star-half-alt"></i></span>
                                                <span class="single-rating"><i class="far fa-star"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-slide">
                                    <div class="pm-product product-type-list">
                                        <a href="product-details.php" class="image">
                                            <img src="{{asset('giftoliaa/assets/images/product/home-3/product-7.webp')}}" alt="">
                                        </a>
                                        <div class="content">
                                            <h3> <a href="product-details.php"> Convallis quam sit </a></h3>
                                            <div class="price text-orange">
                                                <span class="old">$200</span>
                                                <span>$300</span>
                                            </div>
                                            <div class="rating-widget mt--20">
                                                <span class="single-rating"><i class="fas fa-star"></i></span>
                                                <span class="single-rating"><i class="fas fa-star"></i></span>
                                                <span class="single-rating"><i class="fas fa-star"></i></span>
                                                <span class="single-rating"><i class="fas fa-star-half-alt"></i></span>
                                                <span class="single-rating"><i class="far fa-star"></i></span>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="single-slide">
                                    <div class="pm-product product-type-list">
                                        <a href="product-details.php" class="image">
                                            <img src="{{asset('giftoliaa/assets/images/product/home-3/product-8.webp')}}" alt="">
                                        </a>
                                        <div class="content">
                                            <h3> <a href="product-details.php"> Convallis quam sit </a></h3>
                                            <div class="price text-orange">
                                                <span class="old">$200</span>
                                                <span>$300</span>
                                            </div>
                                            <div class="rating-widget mt--20">
                                                <span class="single-rating"><i class="fas fa-star"></i></span>
                                                <span class="single-rating"><i class="fas fa-star"></i></span>
                                                <span class="single-rating"><i class="fas fa-star"></i></span>
                                                <span class="single-rating"><i class="fas fa-star-half-alt"></i></span>
                                                <span class="single-rating"><i class="far fa-star"></i></span>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="single-slide">
                                    <div class="pm-product product-type-list">
                                        <a href="product-details.php" class="image">
                                            <img src="{{asset('giftoliaa/assets/images/product/home-3/product-9.webp')}}" alt="">
                                        </a>
                                        <div class="content">
                                            <h3> <a href="product-details.php"> Convallis quam sit </a></h3>
                                            <div class="price text-orange">
                                                <span class="old">$200</span>
                                                <span>$300</span>
                                            </div>
                                            <div class="rating-widget mt--20">
                                                <span class="single-rating"><i class="fas fa-star"></i></span>
                                                <span class="single-rating"><i class="fas fa-star"></i></span>
                                                <span class="single-rating"><i class="fas fa-star"></i></span>
                                                <span class="single-rating"><i class="fas fa-star-half-alt"></i></span>
                                                <span class="single-rating"><i class="far fa-star"></i></span>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="single-slide">
                                    <div class="pm-product product-type-list">
                                        <a href="product-details.php" class="image">
                                            <img src="{{asset('giftoliaa/assets/images/product/home-3/product-10.webp')}}" alt="">
                                        </a>
                                        <div class="content">
                                            <h3> <a href="product-details.php"> Convallis quam sit </a></h3>
                                            <div class="price text-orange">
                                                <span class="old">$200</span>
                                                <span>$300</span>
                                            </div>
                                            <div class="rating-widget mt--20">
                                                <span class="single-rating"><i class="fas fa-star"></i></span>
                                                <span class="single-rating"><i class="fas fa-star"></i></span>
                                                <span class="single-rating"><i class="fas fa-star"></i></span>
                                                <span class="single-rating"><i class="fas fa-star-half-alt"></i></span>
                                                <span class="single-rating"><i class="far fa-star"></i></span>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="single-slide">
                                    <div class="pm-product product-type-list">
                                        <a href="product-details.php" class="image">
                                            <img src="{{asset('giftoliaa/assets/images/product/home-3/product-11.webp')}}" alt="">
                                        </a>
                                        <div class="content">
                                            <h3> <a href="product-details.php"> Convallis quam sit </a></h3>
                                            <div class="price text-orange">
                                                <span class="old">$200</span>
                                                <span>$300</span>
                                            </div>
                                            <div class="rating-widget mt--20">
                                                <span class="single-rating"><i class="fas fa-star"></i></span>
                                                <span class="single-rating"><i class="fas fa-star"></i></span>
                                                <span class="single-rating"><i class="fas fa-star"></i></span>
                                                <span class="single-rating"><i class="fas fa-star-half-alt"></i></span>
                                                <span class="single-rating"><i class="far fa-star"></i></span>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single-slide-block">
                            <a class="promo-image overflow-image">
                                <img src="{{asset('giftoliaa/assets/images/product/slidebar-promo-product.webp')}}" alt="">
                            </a>
                        </div>
                        <div class="single-slide-block">
                            <div class="policy-block policy-hr">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="policy-block-single">
                                            <div class="icon">
                                                <span class="ti-truck"></span>
                                            </div>
                                            <div class="text">
                                                <h3>Free Delivery</h3>
                                                <p>On orders of $200+</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="policy-block-single">
                                            <div class="icon">
                                                <span class="ti-credit-card"></span>
                                            </div>
                                            <div class="text">
                                                <h3>Cod</h3>
                                                <p>Cash on Delivery</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="policy-block-single">
                                            <div class="icon">
                                                <span class="ti-gift"></span>
                                            </div>
                                            <div class="text">
                                                <h3>Free Gift Box</h3>
                                                <p>Buy a Gift</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="policy-block-single">
                                            <div class="icon">
                                                <span class="ti-headphone-alt"></span>
                                            </div>
                                            <div class="text">
                                                <h3>Free Support 24/7</h3>
                                                <p>Online 24hrs a Day</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>

    <!-- slide Block 3 -->
    {{-- <div class="pt--50">
        <div class="container">
            <div class="block-title-3">
                <h2>TOP RATED PRODUCTS</h2>
            </div>
            <div class="petmark-slick-slider petmark-slick-slider--wrapper-2 border normal-slider" data-slick-setting='{
                    "autoplay": true,
                    "autoplaySpeed": 3000,
                    "slidesToShow": 3,
                    "infinite": true,
                    "arrows": true
                }'
                data-slick-responsive='[
                    {"breakpoint":991, "settings": {"slidesToShow": 2} },
                    {"breakpoint":768, "settings": {"slidesToShow": 1} }
                ]'>

                <div class="single-slide">
                    <div class="pm-product  product-type-list">
                        <div class="image">
                            <a href="product-details.php"><img src="{{asset('giftoliaa/assets/images/product/home-3/product-7.webp')}}" alt=""></a>
                            <span class="onsale-badge">Sale!</span>
                        </div>
                        <div class="content">
                            <h3> <a href="product-details.php"> Convallis quam sit </a></h3>
                            <div class="price text-orange">
                                <span class="old">$200</span>
                                <span>$300</span>
                            </div>
                            <div class="rating-widget mt--20">
                                <a href="javascript:;" class="single-rating"><i class="fas fa-star"></i></a>
                                <a href="javascript:;" class="single-rating"><i class="fas fa-star"></i></a>
                                <a href="javascript:;" class="single-rating"><i class="fas fa-star"></i></a>
                                <a href="" class="single-rating"><i class="fas fa-star-half-alt"></i></a>
                                <a href="" class="single-rating"><i class="far fa-star"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-slide">
                    <div class="pm-product  product-type-list">
                        <div class="image">
                            <a href="product-details.php"><img src="{{asset('giftoliaa/assets/images/product/home-3/product-8.webp')}}" alt=""></a>
                            <span class="onsale-badge">Sale!</span>
                        </div>
                        <div class="content">
                            <h3> <a href="product-details.php"> Convallis quam sit </a></h3>
                            <div class="price text-orange">
                                <span class="old">$200</span>
                                <span>$300</span>
                            </div>
                            <div class="rating-widget mt--20">
                                <a href="javascript:;" class="single-rating"><i class="fas fa-star"></i></a>
                                <a href="javascript:;" class="single-rating"><i class="fas fa-star"></i></a>
                                <a href="javascript:;" class="single-rating"><i class="fas fa-star"></i></a>
                                <a href="" class="single-rating"><i class="fas fa-star-half-alt"></i></a>
                                <a href="" class="single-rating"><i class="far fa-star"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-slide">
                    <div class="pm-product  product-type-list">
                        <div class="image">
                            <a href="product-details.php"><img src="{{asset('giftoliaa/assets/images/product/home-3/product-6.webp')}}" alt=""></a>
                            <span class="onsale-badge">Sale!</span>
                        </div>
                        <div class="content">
                            <h3> <a href="product-details.php"> Convallis quam sit </a></h3>
                            <div class="price text-orange">
                                <span class="old">$200</span>
                                <span>$300</span>
                            </div>
                            <div class="rating-widget mt--20">
                                <a href="javascript:;" class="single-rating"><i class="fas fa-star"></i></a>
                                <a href="javascript:;" class="single-rating"><i class="fas fa-star"></i></a>
                                <a href="javascript:;" class="single-rating"><i class="fas fa-star"></i></a>
                                <a href="" class="single-rating"><i class="fas fa-star-half-alt"></i></a>
                                  <a href="" class="single-rating"><i class="far fa-star"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-slide">
                    <div class="pm-product  product-type-list">
                        <div class="image">
                            <a href="product-details.php"><img src="{{asset('giftoliaa/assets/images/product/home-3/product-7.webp')}}" alt=""></a>
                            <span class="onsale-badge">Sale!</span>
                        </div>
                        <div class="content">
                            <h3> <a href="product-details.php"> Convallis quam sit </a></h3>
                            <div class="price text-orange">
                                <span class="old">$200</span>
                                <span>$300</span>
                            </div>
                            <div class="rating-widget mt--20">
                                <a href="javascript:;" class="single-rating"><i class="fas fa-star"></i></a>
                                <a href="javascript:;" class="single-rating"><i class="fas fa-star"></i></a>
                                <a href="javascript:;" class="single-rating"><i class="fas fa-star"></i></a>
                                <a href="" class="single-rating"><i class="fas fa-star-half-alt"></i></a>
                                  <a href="" class="single-rating"><i class="far fa-star"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-slide">
                    <div class="pm-product  product-type-list">
                        <div class="image">
                            <a href="product-details.php"><img src="{{asset('giftoliaa/assets/images/product/home-3/product-3.webp')}}" alt=""></a>
                            <span class="onsale-badge">Sale!</span>
                        </div>
                        <div class="content">
                            <h3> <a href="product-details.php"> Convallis quam sit </a></h3>
                            <div class="price text-orange">
                                <span class="old">$200</span>
                                <span>$300</span>
                            </div>
                            <div class="rating-widget mt--20">
                                <a href="javascript:;" class="single-rating"><i class="fas fa-star"></i></a>
                                <a href="javascript:;" class="single-rating"><i class="fas fa-star"></i></a>
                                <a href="javascript:;" class="single-rating"><i class="fas fa-star"></i></a>
                                <a href="" class="single-rating"><i class="fas fa-star-half-alt"></i></a>
                                  <a href="" class="single-rating"><i class="far fa-star"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-slide">
                    <div class="pm-product  product-type-list">
                        <div class="image">
                            <a href="product-details.php"><img src="{{asset('giftoliaa/assets/images/product/home-3/product-2.webp')}}" alt=""></a>
                            <span class="onsale-badge">Sale!</span>
                        </div>
                        <div class="content">
                            <h3> <a href="product-details.php"> Convallis quam sit </a></h3>
                            <div class="price text-orange">
                                <span class="old">$200</span>
                                <span>$300</span>
                            </div>
                            <div class="rating-widget mt--20">
                                <a href="javascript:;" class="single-rating"><i class="fas fa-star"></i></a>
                                <a href="javascript:;" class="single-rating"><i class="fas fa-star"></i></a>
                                <a href="javascript:;" class="single-rating"><i class="fas fa-star"></i></a>
                                <a href="" class="single-rating"><i class="fas fa-star-half-alt"></i></a>
                                  <a href="" class="single-rating"><i class="far fa-star"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-slide">
                    <div class="pm-product  product-type-list">
                        <div class="image">
                            <a href="product-details.php"><img src="{{asset('giftoliaa/assets/images/product/home-3/product-1.webp')}}" alt=""></a>
                            <span class="onsale-badge">Sale!</span>
                        </div>
                        <div class="content">
                            <h3> <a href="product-details.php"> Convallis quam sit </a></h3>
                            <div class="price text-orange">
                                <span class="old">$200</span>
                                <span>$300</span>
                            </div>
                            <div class="rating-widget mt--20">
                                <a href="javascript:;" class="single-rating"><i class="fas fa-star"></i></a>
                                <a href="javascript:;" class="single-rating"><i class="fas fa-star"></i></a>
                                <a href="javascript:;" class="single-rating"><i class="fas fa-star"></i></a>
                                <a href="" class="single-rating"><i class="fas fa-star-half-alt"></i></a>
                                  <a href="" class="single-rating"><i class="far fa-star"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-slide">
                    <div class="pm-product  product-type-list">
                        <div class="image">
                            <a href="product-details.php"><img src="{{asset('giftoliaa/assets/images/product/home-3/product-9.webp')}}" alt=""></a>
                            <span class="onsale-badge">Sale!</span>
                        </div>
                        <div class="content">
                            <h3> <a href="product-details.php"> Convallis quam sit </a></h3>
                            <div class="price text-orange">
                                <span class="old">$200</span>
                                <span>$300</span>
                            </div>
                            <div class="rating-widget mt--20">
                                <a href="#" class="single-rating"><i class="fas fa-star"></i></a>
                                <a href="#" class="single-rating"><i class="fas fa-star"></i></a>
                                <a href="#" class="single-rating"><i class="fas fa-star"></i></a>
                                <a href="" class="single-rating"><i class="fas fa-star-half-alt"></i></a>
                                  <a href="" class="single-rating"><i class="far fa-star"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- slide Block 3 / Normal Slider -->
    {{-- <div class="pt--50 pb--50">
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
                        <img src="{{asset('giftoliaa/assets/images/brand/brand.webp')}}" alt="">
                    </a>
                </div>
                <div class="single-slide">
                    <a href="#" class="overflow-image brand-image">
                        <img src="{{asset('giftoliaa/assets/images/brand/brand-2.webp')}}" alt="">
                    </a>
                </div>
                <div class="single-slide">
                    <a href="#" class="overflow-image brand-image">
                        <img src="{{asset('giftoliaa/assets/images/brand/brand-3.webp')}}" alt="">
                    </a>
                </div>
                <div class="single-slide">
                    <a href="#" class="overflow-image brand-image">
                        <img src="{{asset('giftoliaa/assets/images/brand/brand-4.webp')}}" alt="">
                    </a>
                </div>
                <div class="single-slide">
                    <a href="#" class="overflow-image brand-image">
                        <img src="{{asset('giftoliaa/assets/images/brand/brand-5.webp')}}" alt="">
                    </a>
                </div>
                <div class="single-slide">
                    <a href="#" class="overflow-image brand-image">
                        <img src="{{asset('giftoliaa/assets/images/brand/brand-6.webp')}}" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- slide Block 3 -->
    {{-- <div class="pb--50">
        <div class="container">
            <div class="block-title-3">
                <h2>TOP RATED VIDEOS</h2>
            </div>
            <div class="petmark-slick-slider petmark-slick-slider--wrapper-2 border normal-slider" data-slick-setting='{
                    "autoplay": true,
                    "autoplaySpeed": 3000,
                    "slidesToShow": 3,
                    "infinite": true,
                    "arrows": true
                }'
                data-slick-responsive='[
                    {"breakpoint":991, "settings": {"slidesToShow": 2} },
                    {"breakpoint":768, "settings": {"slidesToShow": 1} }
                ]'>

                <div class="single-slide">
                    <div class="pm-product  product-type-list">
                        <iframe width="100%" height="250" src="https://www.youtube.com/embed/X8ghLbjjOmE?si=hVQYFHJ-kgf9IBbg" title="YouTube video player" frameborder="0" allow="" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="single-slide">
                    <div class="pm-product  product-type-list">
                        <iframe width="100%" height="250" src="https://www.youtube.com/embed/jFMA5ggFsXU?si=G24m-mfDdcSF2C-m" title="YouTube video player" frameborder="0" allow="" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="single-slide">
                    <div class="pm-product  product-type-list">
                        <iframe width="100%" height="250" src="https://www.youtube.com/embed/X8ghLbjjOmE?si=hVQYFHJ-kgf9IBbg" title="YouTube video player" frameborder="0" allow="" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="single-slide">
                    <div class="pm-product  product-type-list">
                        <iframe width="100%" height="250" src="https://www.youtube.com/embed/jFMA5ggFsXU?si=G24m-mfDdcSF2C-m" title="YouTube video player" frameborder="0" allow="" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="single-slide">
                    <div class="pm-product  product-type-list">
                        <iframe width="100%" height="250" src="https://www.youtube.com/embed/X8ghLbjjOmE?si=hVQYFHJ-kgf9IBbg" title="YouTube video player" frameborder="0" allow="" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="single-slide">
                    <div class="pm-product  product-type-list">
                        <iframe width="100%" height="250" src="https://www.youtube.com/embed/jFMA5ggFsXU?si=G24m-mfDdcSF2C-m" title="YouTube video player" frameborder="0" allow="" allowfullscreen></iframe>
                    </div>
                </div>

            </div>
        </div>
    </div> --}}
@endsection
