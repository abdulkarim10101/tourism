@extends('frontend.layouts.app')

@section('content')
    <main id="content" role="main" class="">
        <!-- breadcrumb -->
        <div class=" bg-gray-13 bg-md-transparent">
            <div class="container">
                <!-- breadcrumb -->
                @include('customer.breadcrumbs')
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
                                <div id="my-orders" class="tab-pane fade in active show">
                                    <div class="block block-dashboard-info">
                                        <div class="block-title">My Order</div>
                                    </div>
                                    <div class="message info empty displaynonecustom">
                                        <span>You have placed no orders.</span>
                                    </div>
                                    <form class="mb-4 mt-5" action="#" method="post">
                                        <table class="table" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th class="product-thumbnail">
                                                        #
                                                    </th>
                                                    <th class="product-thumbnail">

                                                    </th>
                                                    <th class="product-thumbnail">
                                                        SKU #
                                                    </th>
                                                    <th class="product-name">
                                                        Product Name
                                                    </th>
                                                    <th class="product-name">
                                                        Quantity
                                                    </th>
                                                    <th class="product-price">
                                                        Price
                                                    </th>
                                                    {{-- <th class="product-quantity w-lg-15">
                                       Details
                                    </th> --}}
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($order_details as $key => $item)
                                                    <tr class="">
                                                        <td>
                                                            {{ $key + 1 }}
                                                        </td>
                                                        <td>
                                                            <a
                                                                href="{{ route('shop.productdetail', $item->product->slug) }}">
                                                                <img class="img-fluid img-cart max-width-100 p-1 border border-color-1"
                                                                    src="{{ $item->product->images[0]->images }}"
                                                                    alt="Image Description">
                                                            </a>
                                                        </td>
                                                        <td>

                                                            {{ optional($item->product)->sku }}
                                                        </td>
                                                        <td>

                                                            {{ optional($item->product)->name }}
                                                        </td>
                                                        <td data-title="
                                           Price">
                                                            {{ $item->qty }}
                                                        </td>

                                                        <td data-title="
                                           Price">
                                                            @if (optional($item->product)->special_price != null)
                                                                ${{ optional($item->product)->special_price }}
                                                                <s class="cutprice">${{ optional($item->product)->price }}</s>
                                                            @else
                                                                ${{ optional($item->product)->price }}
                                                            @endif
                                                        </td>
                                                        {{-- <td data-title="Quantity">
                                       {{ $item->created_at->diffForHumans() }}
                                    </td> --}}
                                                        {{-- <td data-title="Total">
                                      <a href="{{route('customer.order_detail',$item->id)}}"><button type="button" class="btn btn-danger">View</button></a>
                                    </td> --}}
                                                    </tr>
                                                @endforeach
                                                <tr>
                                                    <td colspan="
                                           6" class="border-top space-top-2 justify-content-center">
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
