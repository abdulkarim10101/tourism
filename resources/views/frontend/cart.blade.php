@extends('frontend.layouts.app')

@section('title', 'Home Page')

@section('content')

    <main id="content" role="main" class="cart-page">
        <!-- breadcrumb -->
        <div class="bg-gray-13 bg-md-transparent">
            <div class="container">
                <!-- breadcrumb -->
                <div class="my-md-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="/">Home</a>
                            </li>
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Cart</li>
                        </ol>
                    </nav>
                </div>
                <!-- End breadcrumb -->
            </div>
        </div>
        <!-- End breadcrumb -->

        <div class="container">
            <div class="mb-4">
                <h1 class="text-center">Cart</h1>
            </div>
            <div class="mb-10 cart-table">
                <form class="mb-4" action="#" method="post">
                    <table class="table" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="product-remove">&nbsp;</th>
                                <th class="product-thumbnail">&nbsp;</th>
                                <th class="product-name">Product</th>
                                <th class="product-name">SKU</th>
                                <th class="product-price">Price</th>
                                <th class="product-quantity w-lg-15">Quantity</th>
                                <th class="product-subtotal">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $totals=0; @endphp
                            @foreach ($products as $key => $item)
                                <tr class="">
                                    <td class=" text-center">
                                        <a href="{{ route('cart.removeItem', $key) }}"
                                            class="text-gray-32 font-size-26 remove">×</a>
                                    </td>
                                    <td class="d-md-table-cell">
                                        <a href="#"><img class="img-fluid max-width-100 p-1 w-100-px border border-color-1"
                                                src="{{ $item['item']['images'][0]['images'] }}"
                                                alt="Image Description"></a>
                                    </td>

                                    <td data-title="Product">
                                        <a href="#" class="text-gray-90">{{ $item['item']['name'] }}</a>
                                    </td>
                                    <td>{{ $item['item']['sku'] }}</td>
                                    <td data-title="Price">
                                        <span class="">AED {{ $item['item']['price'] }}</span>
                                        <input type="hidden" id="price{{ $key }}"
                                            value="{{ $item['item']['price'] }}">
                                    </td>

                                    <td data-title="Quantity">
                                        <span class="sr-only">Quantity</span>
                                        <!-- Quantity -->
                                        <div class="border rounded-pill py-1 width-122 w-xl-80 px-3 border-color-1 text-center" style="width: fit-content;">
                                            <div class="js-quantity row align-items-center">
                                                <div class="col" style="width: 36px;">
                                                    <input class="form-control h-auto border-0 rounded p-0 shadow-none"
                                                        type="text" id="quantity{{ $key }}"
                                                        value="{{ $item['qty'] }}">
                                                </div>
                                                <div class="col-auto pr-1">
                                                    <a onclick="increasebyone('{{ route('cart.decreasebyone', $key) }}','quantity{{ $key }}','-',{{ $key }})"
                                                        class="js-minus px-1 btn-icon btn-xs btn-outline-secondary rounded-circle border-0"
                                                        href="javascript:;">
                                                        <small class="fas fa-minus btn-icon__inner"></small>
                                                    </a>
                                                    <a onclick="increasebyone('{{ route('cart.increasebyone', $key) }}','quantity{{ $key }}','+',{{ $key }})"
                                                        class="js-plus px-1 btn-icon btn-xs btn-outline-secondary rounded-circle border-0"
                                                        href="javascript:;">
                                                        <small class="fas fa-plus btn-icon__inner"></small>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Quantity -->
                                    </td>

                                    <td data-title="Total">
                                        <span class=""
                                            id="total_price{{ $key }}">AED {{ $item['price'] }}</span>
                                    </td>
                                </tr>
                                @php $totals+=$item['price']; @endphp
                            @endforeach

                            <tr>
                                <td colspan="6" class="border-top space-top-2 justify-content-center">
                                    <div class="pt-md-3">
                                        <div class="d-block d-md-flex flex-center-between">
                                            <div class="mb-3 mb-md-0 w-xl-40">
                                                <!-- Apply coupon Form -->
                                                <div class="couponForm"
                                                    @if (Session::has('coupon_code')) style="display: none;" @endif>
                                                    <label class="sr-only" for="subscribeSrEmailExample1">Coupon
                                                        code</label>
                                                    <div class="input-group">
                                                        <input type="text" id="coupon_code" class="form-control"
                                                            name="text" id="subscribeSrEmailExample1"
                                                            placeholder="Coupon code" aria-label="Coupon code"
                                                            aria-describedby="subscribeButtonExample2" required>
                                                        <div class="input-group-append">
                                                            <button class="btn btn-block btn-dark px-4" type="button"
                                                                id="subscribeButtonExample2" onclick="addCoupon()"><i
                                                                    class="fas fa-tags d-md-none"></i><span
                                                                    class="d-none d-md-inline">Apply coupon</span></button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="couponDiv"
                                                    @if (!Session::has('coupon_code')) style="display: none;" @endif>
                                                    <div id="shopCartHeadingTwo" class="alert alert-primary mb-0 mt-4"
                                                        role="alert">
                                                        <strong id="coupontext">Coupon
                                                            "{{ Session::has('coupon_code') ? Session::get('coupon_code') : '' }}"
                                                            Applied</strong>
                                                    </div>
                                                </div>
                                                <!-- End Apply coupon Form -->
                                            </div>
                                            <div class="d-md-flex">
                                                {{-- <button type="button"
                                                class="btn btn-soft-secondary mb-3 mb-md-0 font-weight-normal px-5 px-md-4 px-lg-5 w-100 w-md-auto">Update
                                                cart</button> --}}

                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
            <div class="mb-8 cart-total">
                <div class="row">
                    <div class="col-xl-5 col-lg-6 offset-lg-6 offset-xl-7 col-md-8 offset-md-4">
                        <div class="border-bottom border-color-1 mb-3">
                            <h3 class="d-inline-block section-title mb-0 pb-2 font-size-26">Total</h3>
                        </div>
                        <table class="table mb-3 mb-md-0">
                            <tbody>
                                <tr class="cart-subtotal">
                                    <th>Subtotal</th>
                                    <td data-title="Subtotal">AED <span class="amount subtotal1">{{ $totals }}</span>
                                    </td>
                                </tr>
                                <tr class="cart-subtotal">
                                    <th>Discount</th>
                                    <td data-title="Subtotal"><span class="amount discount_percentage">
                                            {{ Session::has('coupon_percentage') ? Session::get('coupon_percentage') : '0' }}%</span>
                                    </td>
                                </tr>
                                {{-- <tr class="shipping">
                                <th>Shipping</th>
                                <td data-title="Shipping">
                                    Flat Rate: <span class="amount">AED 300.00</span>
                                    <div class="mt-1">
                                        <a class="font-size-12 text-gray-90 text-decoration-on underline-on-hover font-weight-bold mb-3 d-inline-block"
                                            data-toggle="collapse" href="#collapseExample" role="button"
                                            aria-expanded="false" aria-controls="collapseExample">
                                            Calculate Shipping
                                        </a>
                                        <div class="collapse mb-3" id="collapseExample">
                                            <div class="form-group mb-4">
                                                <select
                                                    class="js-select selectpicker dropdown-select right-dropdown-0-all w-100"
                                                    data-style="bg-white font-weight-normal border border-color-1 text-gray-20">

                                                </select>
                                            </div>
                                            <div class="form-group mb-4">
                                                <select
                                                    class="js-select selectpicker dropdown-select right-dropdown-0-all w-100"
                                                    data-style="bg-white font-weight-normal border border-color-1 text-gray-20">

                                                </select>
                                            </div>
                                            <input class="form-control mb-4" type="text" placeholder="Postcode / ZIP">
                                            <button type="button"
                                                class="btn btn-soft-secondary mb-3 mb-md-0 font-weight-normal px-5 px-md-4 px-lg-5 w-100 w-md-auto">Update
                                                Totals</button>
                                        </div>
                                    </div>
                                </td>
                            </tr> --}}
                                <tr class="order-total">
                                    <th>Total</th>
                                    <td data-title="Total"><strong>AED <span class="amount" id="total1">
                                                @if (Session::get('coupon_percentage') != null)
                                                    {{ $totals - (Session::get('coupon_percentage') / 100) * $totals }}
                                                @else
                                                    {{ $totals }}
                                                @endif
                                            </span></strong></td>
                                </tr>
                            </tbody>
                        </table>
                        <a href="{{ route('checkout.index') }}"><button type="button"
                                class="btn btn-dark my-2 ml-md-2 w-100 w-md-auto text-align-right text-right">Proceed
                                to checkout</button></a>
                    </div>
                </div>
            </div>
        </div>
    </main>


    <script>
        function increasebyone(url, divId, op, key1) {
            newvalue = 0
            if (op == '+') {
                newvalue = parseInt($('#' + divId).val()) + 1
                $('#' + divId).val(newvalue)
                priceDiv = 'price' + key1;
                sum = $('#' + priceDiv).val() * parseInt($('#' + divId).val());
                $('#total_price' + key1).text(sum)
                sum2 = parseInt($('#total1').text()) + parseInt($('#' + priceDiv).val());
                sum3 = parseInt($('.subtotal1').text()) + parseInt($('#' + priceDiv).val());
                $('#total1').text(sum2.toString())
                $('.subtotal1').text(sum3.toString())
            } else {
                if ($('#' + divId).val() <= 1) {} else {
                    newvalue = parseInt($('#' + divId).val()) - 1
                    $('#' + divId).val(newvalue)
                    priceDiv = 'price' + key1;
                    sum = $('#' + priceDiv).val() * parseInt($('#' + divId).val());
                    $('#total_price' + key1).text(sum)
                    sum2 = parseInt($('#total1').text()) - parseInt($('#' + priceDiv).val());
                    sum3 = parseInt($('.subtotal1').text()) - parseInt($('#' + priceDiv).val());
                    $('#total1').text(sum2.toString())
                    $('.subtotal1').text(sum3.toString())
                }
            }
            if (newvalue != 0) {

                $.ajax({
                    url: url,
                    dataType: 'json',
                    success: function(resp) {
                        console.log(resp)
                    }
                });
            }

        }

        function addCoupon() {
            // alert('h')
            data = $('#couponForm').serialize()
            console.log(data)

            $.ajax({
                url: "{{ route('shop.addCoupon') }}",
                data: {
                    coupon_code: $('#coupon_code').val()
                },
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                success: function(response) {
                    $('.couponDiv').show()
                    if (response.message == 'Coupon Applied') {
                        $('.couponForm').hide()
                        $('#coupontext').text('Congratulations Promo Code Applied ' + response.percentage +
                            '% discount applicable')
                        $('.discount_percentage').text(response.percentage + '%')
                        afterdiscount = parseInt($('#total1').text()) - ((5 / 100) * parseInt($('#total1')
                        .text()))
                        $('#total1').text(afterdiscount.toString())
                    } else {
                        $('#coupontext').text(response.message)
                    }
                    console.log(response.message)
                }
            })
        }
    </script>

@endsection
