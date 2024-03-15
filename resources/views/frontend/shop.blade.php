@extends('frontend.layouts.app')

@section('title', 'Home Page')

@section('content')

<section class="w3l-ecommerce-main">
    <!-- /View Alls-->
    <div class="ecom-contenthny py-5">
        <div class="container py-lg-5">
            @if (request()->get('keyword'))

            <p>Results matching: {{request()->get('keyword')}}</p>
            @endif
            <h3 class="hny-title mb-0 text-center">Activities That You <span>Love</span></h3>
            {{-- <p class="text-center">Handpicked Favourites just for you</p> --}}
            <!-- /row-->
            <div class="ecom-products-grids row mt-lg-5 mt-3">
                @foreach ($products as $item)

                <div class="col-lg-3 col-6 product-incfhny mt-4">
                    <div class="product-grid2 transmitv">
                        <div class="product-image2">
                            <a href="{{route('shop.productdetail',$item->slug)}}">
                                <img class="pic-1 img-fluid" src="{{$item->images->first() ? $item->images->first()->images : ''}}">
                                <img class="pic-2 img-fluid" src="{{$item->images->first() ? $item->images->first()->images : ''}}">
                            </a>
                            {{-- <ul class="social">
                                <li><a href="{{route('shop.productdetail',$item->slug)}}" data-tip="Quick View"><span class="fa fa-eye"></span></a></li>

                                <li><a href="{{route('shop.productdetail',$item->slug)}}" data-tip="Add to Cart"><span
                                            class="fa fa-shopping-bag"></span></a>
                                </li>
                            </ul> --}}

                        </div>
                        <div class="product-content">
                            <h3 class="title"><a href="{{route('shop.productdetail',$item->slug)}}">{{$item->name}} </a></h3>
                            <span class="price">AED {{$item->price}}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- //row-->
        </div>
    </div>
</section>
    {{-- <nav aria-label="breadcrumb" class="breadcrumb-wrapper">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Shop</li>
            </ol>
        </div>
    </nav>

    <main class="section-padding shop-page-section">
        <div class="container">
            <div class="shop-toolbar mb--30">
                <div class="row align-items-center">
                    <div class="col-5 col-md-3 col-lg-4">
                        <!-- Product View Mode -->
                        <div class="product-view-mode">
                            <a href="#" class="sortting-btn active" data-bs-target="grid"><i
                                    class="fas fa-th"></i></a>
                            <a href="#" class="sortting-btn" data-bs-target="list "><i class="fas fa-list"></i></a>
                        </div>
                    </div>
                    <div class="col-12 col-md-9 col-lg-7 offset-lg-1 mt-3 mt-md-0  pe-md-0">
                        <div class="sorting-selection">
                            <div class="row align-items-center ps-md-0 pe-md-0 g-0">
                                <div class="col-sm-6 col-md-7 col-xl-8 d-flex align-items-center justify-content-md-end">
                                    <span>Sort By:</span>
                                    <select class="form-control nice-select sort-select">
                                        <option value="" selected="selected">Default Sorting</option>
                                        <option value="">Sort By:Name (A - Z)</option>
                                        <option value="">Sort By:Name (Z - A)</option>
                                        <option value="">Sort By:Price (Low &gt; High)</option>
                                        <option value="">Sort By:Price (High &gt; Low)</option>
                                        <option value="">Sort By:Rating (Highest)</option>
                                        <option value="">Sort By:Rating (Lowest)</option>
                                        <option value="">Sort By:Model (A - Z)</option>
                                        <option value="">Sort By:Model (Z - A)</option>
                                    </select>
                                </div>
                                <div class="col-md-5 col-xl-4 col-sm-6 text-sm-end mt-sm-0 mt-3">
                                    <span>Showing 1–20 of {{ $products->total() }} results</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <style>
                .red{
                    color:red;
                }
            </style>
            <div class="shop-product-wrap grid with-pagination row border grid-four-column  me-0 ms-0 g-0">
                @foreach ($products as $product)
                    <div class="col-lg-3 col-sm-6">
                        <div class="pm-product">

                            <a href="{{route('shop.productdetail',$item->slug)}}" class="image" tabindex="0"> <img
                                src="{{$item->images->first() ? $item->images->first()->images : 'null'}}" alt=""> </a>
                            <div class="hover-conents">
                                <ul class="product-btns">
                                    <li><a onclick="addToWishlist(this,{{ $item->id }})" tabindex="0" @if ($item->addedToWishlist()) class="red" @endif><i class="fas fa-heart"></i></a></li>

                                </ul>
                            </div>
                            <div class="content">
                                <h3 class="font-weight-500"><a href="{{route('shop.productdetail',$item->slug)}}">{{ $item->name }}</a></h3>
                                <div class="price text-red">
                                    @if ($item->special_price != 0)
                                        <span class="old">${{ $item->special_price }}</span>
                                        <span>AED {{ $item->price }}</span>
                                    @else
                                        <span>AED {{ $item->price }}</span>
                                    @endif
                                </div>
                                <div class="btn-block grid-btn"> <a onclick="addToCart({{ $item->id }})"
                                        class="btn btn-outlined btn-rounded btn-mid" tabindex="0">Add to Cart</a> </div>
                                <div class="card-list-content ">
                                    <div class="rating-widget mt--20"> <a href="#" class="single-rating"><i
                                                class="fas fa-star"></i></a> <a href="#" class="single-rating"><i
                                                class="fas fa-star"></i></a> <a href="#" class="single-rating"><i
                                                class="fas fa-star"></i></a> <a href="#" class="single-rating"><i
                                                class="fas fa-star"></i></a> <a href="#"
                                            class="single-rating"><i class="fas fa-star"></i></a> </div>
                                    <article>
                                        <h3 class="d-none sr-only">Article</h3>
                                        <p>{{ $item->description }}
                                        </p>
                                    </article>
                                    <div class="btn-block d-flex"> <a onclick="addToCart({{ $item->id }})"
                                            class="btn btn-outlined btn-rounded btn-mid" tabindex="0">Add to Cart</a>
                                        <div class="btn-options"> <a onclick="addToWishlist(this,{{ $item->id }})" @if ($item->addedToWishlist()) class="red" @endif><i class="fas fa-heart"></i>
                                            @if ($item->addedToWishlist()) Added @else Add @endif to Wishlist</a>

                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt--30">
                <div class="pagination-widget">

                    <div class="site-pagination">
                        {{ $products->links() }}

                    </div>
                </div>
            </div>
        </div>
    </main> --}}

@endsection
