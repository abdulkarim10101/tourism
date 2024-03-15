<div class="container d-none d-lg-block mb-3 ourfooterloop">
    <div class="row">
        <div class="col-lg-12">
            <div class="border-bottom border-color-1 mb-5">
                <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18">Featured Products</h3>
            </div>
        </div>
        <div class="col-wd-9 col-lg-12">
            <div class="widget-column">

                <ul class="list-unstyled products-group">
                    @foreach ($featuredproducts as $featuredproduct)

                        <li class="product-item product-item__list row no-gutters mb-6 remove-divider">
                            <div class="col-auto">
                                <a href="{{ route('shop.productdetail', $featuredproduct->slug) }}"
                                    class="d-block width-75 text-center">
                                    <img class="img-fluid" src="{{ $featuredproduct->images[0]->images }}"
                                        alt="Image Description"></a>
                            </div>
                            <div class="col pl-4 d-flex flex-column">
                                <h5 class="product-item__title mb-0"><a
                                        href="{{ route('shop.productdetail', $featuredproduct->slug) }}"
                                        class="text-blue font-weight-bold">{{ $featuredproduct->name }}</a></h5>
                                <div class="prodcut-price mt-auto">
                                    <div class="font-size-15">
                                        @if ($featuredproduct->special_price != null)
                                            ${{ $featuredproduct->special_price }}
                                            <s class="cutprice">${{ $featuredproduct->price }}</s>
                                        @else
                                            ${{ $featuredproduct->price }}
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach


                </ul>
            </div>
        </div>

        <div class="col-wd-3 d-none d-wd-block">
            <a href="../shop/shop.html" class="d-block"><img class="img-fluid"
                    src="../assets/img/330X360/img1.jpg" alt="Image Description"></a>
        </div>
    </div>
</div>

<style>
    .ourfooterloop ul li {
        width: 33%;
        display: inline-flex;
        align-items: top;
        padding-right: 20px;
    }

</style>
