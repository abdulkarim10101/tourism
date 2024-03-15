@foreach ($item->products->slice(0, 8) as $product)

    <div class="col-lg-3">
        <div class="product-item">
            <div class="product-item__outer h-100">
                <div class="product-item__inner px-wd-4 p-2 p-md-3">
                    <div class="product-item__body pb-xl-2">
                        <div class="mb-2"><a href="#."
                                class="font-size-12 text-gray-5">{{ $product->category->name }}</a></div>

                        <div class="mb-2">
                            <a href="{{ route('shop.productdetail', $product->slug) }}"
                                class="d-block text-center"><img class="img-fluid"
                                    src="{{ $product->images[0]->images }}" alt="Image Description"></a>
                        </div>
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
                        <h5 class="mb-1 product-item__title">
                            <a href="{{ route('shop.productdetail', $product->slug) }}"
                                class="text-blue font-weight-bold">{{ $product->name }}</a>
                        </h5>
                    </div>
                    <div class="product-item__footer">
                        <div class="border-top pt-2 flex-center-between flex-wrap">
                            <!-- <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a> -->
                            @if (auth()->user() != null)
                                <a onclick="addToWishlist(this,{{ $product->id }})"
                                    class="text-gray-6 font-size-13 @if ($product->addedToWishlist()) red @endif">
                                    <i class="ec ec-favorites mr-1 font-size-15 "></i>
                                    @if ($product->addedToWishlist())Added To @endif Wishlist</a>
                            @else
                                <a href="#" onclick="addToWishlist(this,{{ $product->id }})"
                                    class="text-gray-6 font-size-13 mr-2"><i
                                        class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
