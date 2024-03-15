{{-- @if (isset($category))
@php
    $products1=$category->products
@endphp
@else
@php
    $products1=$products
@endphp
@endif --}}

@foreach ($products as $product)

    <li class="col-6 col-md-3 col-wd-2gdot4 product-item">
        <div class="product-item__outer h-100">
            <div class="product-item__inner px-xl-4 p-3">
                <div class="product-item__body pb-xl-2">
                    <div class="mb-2"><a href="{{ route('shop.productdetail', $product->slug) }}"
                            class="font-size-12 text-gray-5">{{ $product->category->name }}</a></div>

                    <div class="mb-2">
                        <a href="{{ route('shop.productdetail', $product->slug) }}" class="d-block text-center"><img
                                class="img-fluid-inner" @if ($product->images->isNotEmpty())  src="{{ $product->images[0]->images }}" @endif alt="Image Description"></a>
                    </div>
                    {{-- <div class="mb-3">
                        <a class="d-inline-flex align-items-center small font-size-14" href="#">
                            <div class="text-warning mr-2">
                                <small class="fas fa-star"></small>
                                <small class="fas fa-star"></small>
                                <small class="fas fa-star"></small>
                                <small class="fas fa-star"></small>
                                <small class="far fa-star text-muted"></small>
                            </div>
                            <span class="text-secondary">(40)</span>
                        </a>
                    </div> --}}
                    {{-- <ul class="font-size-12 p-0 text-gray-110 mb-4">
                    <li class="line-clamp-1 mb-1 list-bullet">Brand new and high
                        quality</li>
                    <li class="line-clamp-1 mb-1 list-bullet">Made of supreme quality,
                        durable EVA crush resistant, anti-shock material.</li>
                    <li class="line-clamp-1 mb-1 list-bullet">20 MP Electro and 28
                        megapixel CMOS rear camera</li>
                </ul> --}}

                    {{-- <ul class="font-size-12 p-0 text-gray-110 mb-4">
                        <li class="line-clamp-1 mb-1 list-bullet">{{ $product->short_description }}</li>

                    </ul> --}}


                    <div class="text-gray-20 mb-2 font-size-12">SKU: {{ $product->sku }}</div>
                    <div class="flex-center-between mb-1">
                        <div class="prodcut-price">
                            @if ($product->price != 0)
                                <div class="text-gray-100">
                                    @if ($product->special_price != null)
                                        ${{ $product->special_price }}
                                        <s class="cutprice">${{ $product->price }}</s>
                                    @else
                                        ${{ $product->price }}
                                    @endif
                                </div>
                            @else
                                <div class="text-gray-100">Call For Price</div>
                            @endif
                        </div>
                        <div class="d-none d-xl-block prodcut-add-cart">
                            @if ($product->price != 0)

                                <a onclick="addToCart({{ $product->id }})"
                                    class="btn-add-cart btn-primary transition-3d-hover"><i
                                        class="ec ec-add-to-cart"></i></a>
                            @endif
                        </div>
                    </div>
                    <h5 class="mb-1 product-item__title"><a href="{{ route('shop.productdetail', $product->slug) }}"
                        class="text-blue font-weight-bold">{{ $product->name }}</a></h5>
                </div>
                <div class="product-item__footer">
                    <div class="border-top pt-2 flex-center-between flex-wrap">
                        {{-- <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i
                            class="ec ec-compare mr-1 font-size-15"></i> Compare</a> --}}
                        @if (auth()->user() != null)
                            <a onclick="addToWishlist(this,{{ $product->id }})"
                                class="text-gray-6 font-size-13 @if ($product->addedToWishlist()) red @endif">
                                <i class="ec ec-favorites mr-1 font-size-15 "></i>
                                @if ($product->addedToWishlist())Added To @endif Wishlist</a>
                        @else
                            <a onclick="addToWishlist(this,{{ $product->id }})" class="text-gray-6 font-size-13">
                                <i class="ec ec-favorites mr-1 font-size-15"></i>
                                Wishlist</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </li>
@endforeach
<meta name="csrf-token" content="{{ csrf_token() }}">
