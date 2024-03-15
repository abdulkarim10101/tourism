@foreach ($featuredproducts as $item)
    <li class="product-item__list pb-2 mb-2 pb-md-0 mb-md-0">
        <div class="product-item__outer h-100">
            <div class="product-item__inner py-md-3 mx-3 border-bottom row no-gutters">
                <div class="col-auto product-media-left">
                    <a href="{{ route('shop.productdetail', $item->slug) }}" class="max-width-70 d-block">
                        <img class="img-fluid" src="{{ $item->images[0]->images }}" alt="Image Description">
                    </a>
                </div>
                <div class="col product-item__body pl-2 pl-lg-3">
                    <div class="mb-4">
                        <h5 class="product-item__title"><a href="{{ route('shop.productdetail', $item->slug) }}"
                                class="text-gray-90">{{ $item->name }}</a></h5>
                    </div>
                    <div class="flex-center-between">
                        <div class="prodcut-price">
                            <div class="text-gray-100 font-size-15 font-weight-bold">
                                @if ($item->special_price != null)
                                    ${{ $item->special_price }}
                                    <s class="cutprice">${{ $item->price }}</s>
                                @else
                                    ${{ $item->price }}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </li>
@endforeach
