@extends('frontend.layouts.app')

@section('content')
    <main id="content" role="main" class="">
        <!-- breadcrumb -->
        <div class=" bg-gray-13 bg-md-transparent">
            <div class="container">
                <!-- breadcrumb -->
                <div class="my-md-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="/">Home</a>
                            </li>
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Account
                            </li>
                        </ol>
                    </nav>
                </div>
                <!-- End breadcrumb -->
            </div>
        </div>
        <!-- End breadcrumb -->

        <div class="container">
            <div class="mb-4">
                <h1 class="text-center">Account</h1>
            </div>
            <div class="mb-10 cart-table">
                <div class="row d-flex justify-content-between align-items-start">
                    @include('customer.profilenav')

                    <div class="col-lg-9 col-sm-12">
                        <div class="account-tabs-content">
                            <div class="tab-content">
                                <div id="mywishlist" class="tab-pane fade in active show">

                                    <div class="block block-dashboard-info">
                                        <div class="block-title">Wish List</div>

                                    </div>

                                    <div class="message info empty displaynonecustom"><span>You have placed no
                                            orders.</span></div>


                                    <form class="mb-4 mt-5" action="#" method="post">
                                        <table class="table" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th class="product-remove">&nbsp;</th>
                                                    <th class="product-thumbnail">&nbsp;</th>
                                                    <th class="product-name">Product</th>
                                                    <th class="product-name">SKU</th>
                                                    <th class="product-price">Price</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($customer->wishlist as $item)

                                                    <tr class="">
                                                        <td
                                                            class="
                                                    text-center">
                                                            <a href="{{ route('wishlist.delete', $item->id) }}"
                                                                class="text-gray-32 font-size-26">×</a>
                                                        </td>
                                                        <td class="d-none d-md-table-cell">
                                                            <a
                                                                href="{{ route('shop.productdetail', $item->product->slug) }}">
                                                                <img class="img-fluid max-width-100 p-1 border border-color-1"
                                                                    src="{{ $item->product->images[0]->images }}"
                                                                    alt="Image Description">
                                                            </a>
                                                        </td>

                                                        <td data-title="Product">
                                                            <a href="{{ route('shop.productdetail', $item->product->slug) }}"
                                                                class="text-gray-90">{{ $item->product->name }}</a>
                                                        </td>


                                                        <td data-title="SKUNUMBER">
                                                            <span class="">#{{ $item->product->sku }}</span>
                                                        </td>
                                                        <td data-title="
                                                                Price">
                                                            @if ($item->product->price == 0)
                                                                <span class="">Call For Price</span>
                                                            @else
                                                                <span class="">
                                                                    @if ($item->product->special_price != null)
                                                                        ${{ $item->product->special_price }}
                                                                        <s class="cutprice">${{ $item->product->price }}</s>
                                                                    @else
                                                                        ${{ $item->product->price }}
                                                                    @endif
                                                                </span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                <tr>
                                                    <td colspan="
                                                                6" class="border-top space-top-2 justify-content-center">
                                                        {{-- <div class="pt-md-3">
                                                                <div class="d-block d-md-flex flex-center-between">
                                                                    <div class="mb-3 mb-md-0 w-xl-40">
                                                                        <!-- Apply coupon Form -->

                                                                        <label class="sr-only"
                                                                            for="subscribeSrEmailExample1">Coupon
                                                                            code</label>
                                                                        <div class="input-group">
                                                                            <input type="text" class="form-control"
                                                                                name="text" id="subscribeSrEmailExample1"
                                                                                placeholder="Coupon code"
                                                                                aria-label="Coupon code"
                                                                                aria-describedby="subscribeButtonExample2"
                                                                                required="">
                                                                            <div class="input-group-append">
                                                                                <button class="btn btn-block btn-dark px-4"
                                                                                    type="button"
                                                                                    id="subscribeButtonExample2"><i
                                                                                        class="fas fa-tags d-md-none"></i><span
                                                                                        class="d-none d-md-inline">Apply
                                                                                        coupon</span></button>
                                                                            </div>
                                                                        </div>

                                                                        <!-- End Apply coupon Form -->
                                                                    </div>
                                                                    <div class="d-md-flex">
                                                                        <button type="button"
                                                                            class="btn btn-soft-secondary mb-3 mb-md-0 font-weight-normal px-5 px-md-4 px-lg-5 w-100 w-md-auto">Update
                                                                            cart</button>
                                                                        <a href="../shop/checkout.html"
                                                                            class="btn btn-primary-dark-w ml-md-2 px-5 px-md-4 px-lg-5 w-100 w-md-auto d-none d-md-inline-block">Proceed
                                                                            to checkout</a>
                                                                    </div>
                                                                </div>
                                                            </div> --}}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection
