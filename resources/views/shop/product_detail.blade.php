@extends('frontend.layouts.app')
@section('content')
@section('meta')
<meta property="og:image" content="https://www.giftoliaa.com/image/giftoliaasquare_gImNu_.jpeg">
<meta name="description" content="{{$product->name}}">
@endsection
    <main class="product-details-section">
        <div class="container">
            <form action="{{ route('cart.store', $product->id) }}" method="post" onsubmit="addToCart({{ $product->id }})">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <input type="hidden" id="qty" name="qty" value="1">
                <div class="pm-product-details">
                    <div class="row">
                        <!-- Blog Details Image Block -->
                        <div class="col-md-6">
                            <div class="image-block">
                                <!-- Zoomable IMage -->
                                <img style="max-height:350px; pointer-events: none;" id="zoom_03" src="{{ $product->images->first() ? $product->images->first()->images : '' }}"
                                    data-zoom-image="{{ $product->images->first() ? $product->images->first()->images : '' }}"
                                    alt="{{$product->slug}}" />
                                <!-- Product Gallery with Slick Slider -->
                                <div id="product-view-gallery" class="elevate-gallery">
                                    <!-- Slick Single -->

                                    @foreach ($product->images as $image)
                                    <a href="#" class="gallary-item"
                                        data-image="{{ $image->images }}"
                                        data-zoom-image="{{ $image->images }}">
                                        <img style="max-width: 100px; max-height:100px;" src="{{ $image->images }}"
                                            alt="" />
                                    </a>

                                @endforeach
                                    <a href="#" class="gallary-item"
                                        data-image="assets/images/product/product-details/product-details-1.webp"
                                        data-zoom-image="assets/images/product/product-details/product-details-1.webp">
                                        <img src="assets/images/product/product-details/product-details-1.webp"
                                            alt="" />
                                    </a>
                                    <!-- Slick Single -->
                                    <a href="#" class="gallary-item"
                                        data-image="assets/images/product/product-details/product-details-2.webp"
                                        data-zoom-image="assets/images/product/product-details/product-details-2.webp">
                                        <img src="assets/images/product/product-details/product-details-2.webp"
                                            alt="" />
                                    </a>
                                    <!-- Slick Single -->
                                    <a href="#" class="gallary-item"
                                        data-image="assets/images/product/product-details/product-details-3.webp"
                                        data-zoom-image="assets/images/product/product-details/product-details-3.webp">
                                        <img src="assets/images/product/product-details/product-details-3.webp"
                                            alt="" />
                                    </a>
                                    <!-- Slick Single -->
                                    <a href="#" class="gallary-item"
                                        data-image="assets/images/product/product-details/product-details-4.webp"
                                        data-zoom-image="assets/images/product/product-details/product-details-4.webp">
                                        <img src="assets/images/product/product-details/product-details-4.webp"
                                            alt="" />
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mt-5 mt-md-0">
                            <div class="description-block">
                                <div class="header-block">
                                    <h3>{{ $product->name }}</h3>
                                    <div class="navigation"> <a href="#"><i class="ion-ios-arrow-back"></i></a> <a
                                            href="#"><i class="ion-ios-arrow-forward"></i></a> </div>
                                </div>
                                <!-- Rating Block -->
                                <div class="rating-block d-flex  mt--10 mb--15">
                                    <div class="rating-widget"> <a href="#" class="single-rating"><i
                                                class="fas fa-star"></i></a> <a href="#" class="single-rating"><i
                                                class="fas fa-star"></i></a> <a href="#" class="single-rating"><i
                                                class="fas fa-star"></i></a> <a href="#" class="single-rating"><i
                                                class="fas fa-star-half-alt"></i></a> <a href="#"
                                            class="single-rating"><i class="far fa-star"></i></a> </div>
                                    <p class="rating-text"><a href="#comment-form">(1 customer review)</a></p>
                                </div>
                                <!-- Price -->
                                <p class="price">
                                    {{-- <span class="old-price">{{ $product->price }}$</span> --}}
                                    {{ $product->price }} AED</p>
                                <!-- Blog Short Description -->
                                <div class="product-description">
                                    <div class="short-description">{!! substr($product->description, 0, 100) !!}...</div>
                                    <div class="full-description" style="display: none;">{!! $product->description !!}</div>
                                    <button style="width:70px" type="button" class="btn btn-link read-more-btn">Read more</button>
                                </div>

                                <div class="status"> <i class="fas fa-check-circle"></i>IN STOCK </div>
                                <!-- Amount and Add to cart -->
                                <form action="./" class="add-to-cart">
                                    <div class="count-input-block">
                                        <input type="number" class="form-control text-center" value="1"
                                            min="1">
                                    </div>
                                    <div class="btn-block"> <a onclick="addToCart({{ $product->id }})" href="#" class="btn btn-outlined btn-rounded">Add to Cart</a> </div>
                                </form>
                                <!-- Wishlist And Compare -->
                                {{-- <div class="btn-options"> <a href="wishlist.php"><i class="ion-ios-heart-outline"></i>Add to
                                        Wishlist</a></div> --}}
                                <!-- Products Tag & Category Meta -->
                                <div class="product-meta mt--30">
                                    <p>Category: <a href="{{route('shop.productbycategory',$product->category->slug)}}" class="single-meta">{{$product->category->name}}</a></p>
                                    {{-- <p>Tags: <a href="#" class="single-meta">Food</a></p> --}}
                                </div>
                                <!-- Share Block 1 -->
                                {{-- <div class="share-block-1">
                                    <ul class="social-btns">
                                        <li><a href="#" class="facebook"><i
                                                    class="far fa-thumbs-up"></i><span>likes 1</span></a></li>
                                        <li><a href="#" class="twitter"><i class="fab fa-twitter"></i>
                                                <span>twitter</span></a></li>
                                        <li><a href="#" class="google"><i class="fas fa-plus-square"></i>
                                                <span>share</span></a></li>
                                    </ul>
                                </div> --}}
                                <!-- Sharing Block 2 -->
                                <div class="share-block-2  mt--30">
                                    <h4>SHARE THIS PRODUCT</h4>
                                    <ul class="social-btns social-btns-2">
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                        <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
        <section class="review-section pt--60">
            <h2 class="sr-only d-none">Product Review</h2>
            <div class="container">
                <div class="product-details-tab">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation"> <a class="nav-link active" id="home-tab"
                                data-bs-toggle="tab" href="#home" role="tab" aria-controls="home"
                                aria-selected="true">DESCRIPTION</a> </li>
                        {{-- <li class="nav-item" role="presentation"> <a class="nav-link" id="profile-tab"
                                data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                                aria-selected="false" tabindex="-1">REVIEWS (1)</a> </li> --}}
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade active show" id="home" role="tabpanel"
                            aria-labelledby="home-tab">
                            <article>
                                <h2 class="d-none sr-only">tab article</h2>
                                <div>
                                    {!! $product->description !!}
                                </div>
                            </article>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="review-wrapper">
                                <h2 class="title-lg mb--20">1 REVIEW FOR AUCTOR GRAVIDA ENIM</h2>
                                <div class="review-comment mb--20">
                                    <div class="avatar"> <img src="assets/images/icon-logo/author-logo.webp"
                                            alt=""> </div>
                                    <div class="text">
                                        <div class="rating-widget mb--15"> <span class="single-rating"><i
                                                    class="fas fa-star"></i></span> <span class="single-rating"><i
                                                    class="fas fa-star"></i></span> <span class="single-rating"><i
                                                    class="fas fa-star"></i></span> <span class="single-rating"><i
                                                    class="fas fa-star-half-alt"></i></span> <span
                                                class="single-rating"><i class="far fa-star"></i></span> </div>
                                        <h6 class="author">ADMIN – <span class="font-weight-400">March 23, 2015</span>
                                        </h6>
                                        <p>Lorem et placerat vestibulum, metus nisi posuere nisl, in accumsan elit odio quis
                                            mi.</p>
                                    </div>
                                </div>
                                <h2 class="title-lg mb--20 pt--15">ADD A REVIEW</h2>
                                <div class="rating-row pt-2">
                                    <p class="d-block">Your Rating</p>
                                    <span class="rating-widget-block">
                                        <input type="radio" name="star" id="star1">
                                        <label for="star1"></label>
                                        <input type="radio" name="star" id="star2">
                                        <label for="star2"></label>
                                        <input type="radio" name="star" id="star3">
                                        <label for="star3"></label>
                                        <input type="radio" name="star" id="star4">
                                        <label for="star4"></label>
                                        <input type="radio" name="star" id="star5">
                                        <label for="star5"></label>
                                    </span>
                                    <form action="./" class="mt--15 site-form ">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="message">Comment</label>
                                                    <textarea name="message" id="message" cols="30" rows="10" class="form-control"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="name">Name *</label>
                                                    <input type="text" id="name" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="email">Email *</label>
                                                    <input type="text" id="email" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="website">Website</label>
                                                    <input type="text" id="website" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="submit-btn"> <a href="#" class="btn btn-black">Post
                                                        Comment</a> </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            {{-- <div class="pt--60">
                <div class="container">
                    <div class="block-title">
                        <h2>YOU MAY ALSO LIKE…</h2>
                    </div>
                    <div class="petmark-slick-slider petmark-slick-slider--wrapper-2 border normal-slider"
                        data-slick-setting='{
                        "autoplay": false,
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
                            <div class="pm-product">
                                <div class="image">
                                    <a href="product-details.php" tabindex="0"><img
                                            src="assets/images/product/shop/product-1.webp" alt=""></a> <span
                                        class="onsale-badge">Sale!</span>
                                </div>
                                <div class="content">
                                    <h3>Convallis quam sit</h3>
                                    <div class="price text-red"> <span class="old">$200</span> <span>$300</span> </div>
                                    <div class="btn-block"> <a href="cart.php" class="btn btn-outlined btn-rounded"
                                            tabindex="0">Add to Cart</a> </div>
                                </div>
                            </div>
                        </div>
                        <div class="single-slide">
                            <div class="pm-product">
                                <div class="image">
                                    <a href="product-details.php" tabindex="0"><img
                                            src="assets/images/product/shop/product-2.webp" alt=""></a> <span
                                        class="onsale-badge">Sale!</span>
                                </div>
                                <div class="content">
                                    <h3>Convallis quam sit</h3>
                                    <div class="price text-red"> <span class="old">$200</span> <span>$300</span> </div>
                                    <div class="btn-block"> <a href="cart.php" class="btn btn-outlined btn-rounded"
                                            tabindex="0">Add to Cart</a> </div>
                                </div>
                            </div>
                        </div>
                        <div class="single-slide">
                            <div class="pm-product">
                                <div class="image">
                                    <a href="product-details.php" tabindex="0"><img
                                            src="assets/images/product/shop/product-3.webp" alt=""></a> <span
                                        class="onsale-badge">Sale!</span>
                                </div>
                                <div class="content">
                                    <h3>Convallis quam sit</h3>
                                    <div class="price text-red"> <span class="old">$200</span> <span>$300</span> </div>
                                    <div class="btn-block"> <a href="cart.php" class="btn btn-outlined btn-rounded"
                                            tabindex="0">Add to Cart</a> </div>
                                </div>
                            </div>
                        </div>
                        <div class="single-slide">
                            <div class="pm-product">
                                <div class="image">
                                    <a href="product-details.php" tabindex="0"><img
                                            src="assets/images/product/shop/product-4.webp" alt=""></a> <span
                                        class="onsale-badge">Sale!</span>
                                </div>
                                <div class="content">
                                    <h3>Convallis quam sit</h3>
                                    <div class="price text-red"> <span class="old">$200</span> <span>$300</span> </div>
                                    <div class="btn-block"> <a href="cart.php" class="btn btn-outlined btn-rounded"
                                            tabindex="0">Add to Cart</a> </div>
                                </div>
                            </div>
                        </div>
                        <div class="single-slide">
                            <div class="pm-product">
                                <div class="image">
                                    <a href="product-details.php" tabindex="0"><img
                                            src="assets/images/product/shop/product-5.webp" alt=""></a> <span
                                        class="onsale-badge">Sale!</span>
                                </div>
                                <div class="content">
                                    <h3>Convallis quam sit</h3>
                                    <div class="price text-red"> <span class="old">$200</span> <span>$300</span> </div>
                                    <div class="btn-block"> <a href="cart.php" class="btn btn-outlined btn-rounded"
                                            tabindex="0">Add to Cart</a> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pt--60">
                <div class="container">
                    <div class="block-title">
                        <h2>RELATED PRODUCTS</h2>
                    </div>
                    <div class="petmark-slick-slider petmark-slick-slider--wrapper-2 border normal-slider"
                        data-slick-setting='{
                        "autoplay": false,
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
                            <div class="pm-product">
                                <div class="image">
                                    <a href="product-details.php" tabindex="-1"><img
                                            src="assets/images/product/home-2/product-1.webp" alt=""></a> <span
                                        class="onsale-badge">Sale!</span>
                                </div>
                                <div class="content">
                                    <h3>Convallis quam sit</h3>
                                    <div class="price text-red"> <span class="old">$200</span> <span>$300</span> </div>
                                    <div class="btn-block"> <a href="cart.php" class="btn btn-outlined btn-rounded"
                                            tabindex="-1">Add to Cart</a> </div>
                                </div>
                            </div>
                        </div>
                        <div class="single-slide">
                            <div class="pm-product">
                                <div class="image">
                                    <a href="product-details.php" tabindex="0"><img
                                            src="assets/images/product/home-2/product-2.webp" alt=""></a> <span
                                        class="onsale-badge">Sale!</span>
                                </div>
                                <div class="content">
                                    <h3>Convallis quam sit</h3>
                                    <div class="price text-red"> <span class="old">$200</span> <span>$300</span> </div>
                                    <div class="btn-block"> <a href="cart.php" class="btn btn-outlined btn-rounded"
                                            tabindex="0">Add to Cart</a> </div>
                                </div>
                            </div>
                        </div>
                        <div class="single-slide">
                            <div class="pm-product">
                                <div class="image">
                                    <a href="product-details.php" tabindex="0"><img
                                            src="assets/images/product/home-2/product-3.webp" alt=""></a> <span
                                        class="onsale-badge">Sale!</span>
                                </div>
                                <div class="content">
                                    <h3>Convallis quam sit</h3>
                                    <div class="price text-red"> <span class="old">$200</span> <span>$300</span> </div>
                                    <div class="btn-block"> <a href="cart.php" class="btn btn-outlined btn-rounded"
                                            tabindex="0">Add to Cart</a> </div>
                                </div>
                            </div>
                        </div>
                        <div class="single-slide">
                            <div class="pm-product">
                                <div class="image">
                                    <a href="product-details.php" tabindex="0"><img
                                            src="assets/images/product/home-2/product-4.webp" alt=""></a> <span
                                        class="onsale-badge">Sale!</span>
                                </div>
                                <div class="content">
                                    <h3>Convallis quam sit</h3>
                                    <div class="price text-red"> <span class="old">$200</span> <span>$300</span> </div>
                                    <div class="btn-block"> <a href="cart.php" class="btn btn-outlined btn-rounded"
                                            tabindex="0">Add to Cart</a> </div>
                                </div>
                            </div>
                        </div>
                        <div class="single-slide">
                            <div class="pm-product">
                                <div class="image">
                                    <a href="product-details.php" tabindex="0"><img
                                            src="assets/images/product/home-2/product-5.webp" alt=""></a> <span
                                        class="onsale-badge">Sale!</span>
                                </div>
                                <div class="content">
                                    <h3>Convallis quam sit</h3>
                                    <div class="price text-red"> <span class="old">$200</span> <span>$300</span> </div>
                                    <div class="btn-block"> <a href="cart.php" class="btn btn-outlined btn-rounded"
                                            tabindex="0">Add to Cart</a> </div>
                                </div>
                            </div>
                        </div>
                        <div class="single-slide">
                            <div class="pm-product">
                                <div class="image">
                                    <a href="product-details.php" tabindex="0"><img
                                            src="assets/images/product/home-2/product-5.webp" alt=""></a> <span
                                        class="onsale-badge">Sale!</span>
                                </div>
                                <div class="content">
                                    <h3>Convallis quam sit</h3>
                                    <div class="price text-red"> <span class="old">$200</span> <span>$300</span> </div>
                                    <div class="btn-block"> <a href="cart.php" class="btn btn-outlined btn-rounded"
                                            tabindex="0">Add to Cart</a> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </section>
    </main>





@endsection
