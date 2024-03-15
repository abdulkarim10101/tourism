@extends('admin.layouts.app')

@section('content')
    <section class="content animate__animated animate__slideInLeft">
        <style>
            .card-footer {
                background: #fff
            }

            .info-box .info-box-content {
                color: #fff !important
            }

            /* not to change */
            /* body {
                        overflow-x: hidden
                    } */

            .navbar-custom {
                border: none !important;
            }

            .animate__animated.animate__fadeInDown {
                --animate-duration: 1.9s;
            }

            /* .ani {
                                                        position: relative;
                                                        animation: mymove 5s;
                                                        animation-iteration-count: 9999999;
                                                    }

                                                    @keyframes  mymove {
                                                        from {
                                                            left: 0px;
                                                        }

                                                        to {
                                                            left: 10px;
                                                        }
                                                    } */

            .ani:hover {

                /* Start the shake animation and make the animation last for 0.5 seconds */
                animation: shake 0.3s;

                /* When the animation is finished, start again */
                animation-iteration-count: 1;
            }

            @keyframes shake {
                0% {
                    transform: translate(1px, 1px) rotate(0deg);
                }

                10% {
                    transform: translate(-1px, -2px) rotate(-1deg);
                }

                20% {
                    transform: translate(-3px, 0px) rotate(1deg);
                }

                30% {
                    transform: translate(3px, 2px) rotate(0deg);
                }

                40% {
                    transform: translate(1px, -1px) rotate(1deg);
                }

                50% {
                    transform: translate(-1px, 2px) rotate(-1deg);
                }

                60% {
                    transform: translate(-3px, 1px) rotate(0deg);
                }

                70% {
                    transform: translate(3px, 1px) rotate(-1deg);
                }

                80% {
                    transform: translate(-1px, -1px) rotate(1deg);
                }

                90% {
                    transform: translate(1px, 2px) rotate(0deg);
                }

                100% {
                    transform: translate(1px, -2px) rotate(-1deg);
                }
            }

            .highlight:hover {
                /* background: #c5c3c396; */
                /* color: #26526a;
                                                            text-shadow: 1px 1px 1px #030e15f7, 0 0 35px #13547ac1, 0 0 5px #13547a; */
                /* color: white; */
                /* background-image: linear-gradient(121deg, #13547a 1%, #07100f 250%); */
                background-image: linear-gradient(121deg, #f5f6f7 1%, #07100f 250%);
                color: black;
                /* color: white */
                text-shadow: 3px 3px 4px #e8e8e8;
                text-transform: capitalize;
                transition: transform .3s;
                transform: scale(1.1);
            }

            .info-box {

                /* background-image: linear-gradient(249deg, #fff 88%, #09103fb9 89%); */
                /* background-image: linear-gradient(236deg, #fff 36%, #09103fb9 106%); */
                /* color: white; */
                /* border: 1px solid black; */
                /* background-image: linear-gradient(236deg, #000 59%, #ef7821 120%); */
                background: #007bff;
                /*
            background-image: linear-gradient(236deg, rgb(255 255 255 / 20%) -165%, #ef7821 168%); */

            }

            .rowf {
                /* background-image: linear-gradient(121deg, #09103f 1%, #80d0c7 250%); */
                /* background-image: linear-gradient(159deg, #000 1%, #ef7821 131%); */
                padding-top: 10px;
                padding-bottom: 2px;
                border-radius: 0px 0px 12px 12px;

            }

            .card {
                box-shadow: 1px 1px 5px rgba(68, 83, 106, 0.652);
                /* box-shadow: 6px 6px 3px #09103f48; */
            }

            .card .card-header {
                color: #383636
            }

            .tablecard .card-header {
                color: #ffffff
            }

            .tablecard {
                background-color: #fff !important;
                color: #000 !important;
            }

            /* .collapsed-card .card-header {
                                background: white;
                                color: rgb(16, 15, 15);
                            } */

            .card-header {
                color: rgb(218, 218, 218);
            }


            @media screen and (max-width: 500px) {
                li.page-item {
                    display: none;
                }

                .page-item:first-child,
                .page-item:nth-child(2),
                .page-item:nth-last-child(2),
                .page-item:last-child,
                .page-item.active,
                .page-item.disabled {
                    display: block;
                }
            }

            .page-link {
                position: relative;
                display: block;
                padding: 0.5rem 0.75rem;
                margin-left: -1px;
                line-height: 1.25;
                color: #ef7821;
                background-color: #141617;
                border: 0px solid #212529;
                /* font-family: Copperplate Gothic Light; */
            }

            .page-link:hover {
                color: #000;
                background-color: #ef7821;
                border: 0px solid #13547a;
            }

            .page-item.active .page-link {
                z-index: 3;
                color: #000;
                background-color: #ef7821;
                border-color: #141617;
            }

            .page-item.disabled .page-link {
                z-index: 3;
                color: #ef7821;
                background-color: #141617;
                border-color: #000;
            }

        </style>
        <div class="row rowf">
            <div id="infoxboxx1" class="col-12 col-sm-6 col-md-3 animate__animated animate__fadeInDown">
                <div class="info-box">

                    <div class="info-box-content">
                        <span class="info-box-text">Products</span>
                        <span class="info-box-number">
                            {{ $productscount }}
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div id="infoxboxx2" class="col-12 col-sm-6 col-md-3 animate__animated animate__fadeInDown">
                <div class="info-box mb-3">

                    <div class="info-box-content">
                        <span class="info-box-text">Customers</span>
                        <span class="info-box-number">
                            {{ $customerscount }}
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

            <div id="infoxboxx3" class="col-12 col-sm-6 col-md-3 animate__animated animate__fadeInDown">
                <div class="info-box mb-3">

                    <div class="info-box-content">
                        <span class="info-box-text">Orders</span>
                        <span class="info-box-number">
                            {{ $orderscount }}
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div id="infoxboxx4" class="col-12 col-sm-6 col-md-3 animate__animated animate__fadeInDown">
                <div class="info-box mb-3">

                    <div class="info-box-content">
                        <span class="info-box-text">Sales</span>
                        <span class="info-box-number">
                            {{ $sales }}

                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>

        <div class="row pt-4 animate__animated animate__fadeInUpBig">
            <div class="col-md-8">
                <div class="card tablecard">
                    <div class="card-header border-transparent">
                        <h3 class="card-title" style="color:#000">Latest Orders</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>

                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="table-responsive table-striped ">

                            <table class="table m-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>User Name</th>
                                        <th>User Contact</th>
                                        {{-- <th>Order Total</th> --}}
                                        <th>Promo Code</th>
                                        <th>Discount</th>
                                        <th>Total</th>
                                        {{-- <th>Status</th> --}}
                                        {{-- <th>Delivery Fee</th> --}}
                                        {{-- <th>Message</th> --}}
                                        {{-- <th>Method</th> --}}
                                        <th>Paid</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($orders as $key=>$item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->user->name }}</td>
                                            <td>{{ $item->user->phone }}</td>
                                            {{-- <td>{{ $item->order_total }}</td> --}}
                                            <td>{{ optional($item->promo)->name }}</td>
                                            <td>{{ optional($item->promo)->percentage }}%</td>
                                            <td>{{ $item->total }}</td>

                                            {{-- <td>
                                            <select name="" id="" onchange="changeOrderStatus(this,{{$item->id}})">
                                                @foreach ($order_statuses as $item1)
                                                    <option @if ($item->status == $item1->name) selected @endif value="{{$item1->name}}">{{$item1->name}}</option>
                                                @endforeach
                                            </select>
                                        </td> --}}
                                            {{-- <td>{{ $item->delivery_fee }}</td> --}}
                                            {{-- <td>{{ $item->extra_comments }}</td> --}}
                                            {{-- <td>{{ $item->method }}</td> --}}
                                            <td>{{ $item->paid }}</td>

                                            {{-- <td>
                                            <select name="lead_status" id="" onchange="changeLeadStatus(this,{{$item->lead->id}})">
                                                @foreach ($lead_statuses as $item1)
                                                    <option @if ($item1->id == $item->lead->lead_status) selected @endif value="{{$item1->id}}">{{ $item1->name}}</option>
                                                @endforeach
                                            </select>
                                        </td> --}}
                                            <td>
                                                <a href="{{ route('orders.show', $item->id) }}" class="float-left"><i
                                                        class="fas fa-eye"></i></a>
                                                {{-- <a href="{{ route('orders.edit', $item->id) }}" class="float-left"><i
                                                    class="fas fa-edit"></i></a> --}}
                                                <form action="{{ route('orders.destroy', $item->id) }}" method="POST">
                                                    @method('delete') @csrf <button class="btn btn-link pt-0"><i
                                                            class="fas fa-trash-alt"></i></button> </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <p>No Data Found</p>
                                    @endforelse
                                </tbody>

                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>

                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        <a href="{{ route('orders.index') }}" class="btn btn-sm btn-info float-right">View All
                            Orders</a>
                    </div>
                    <!-- /.card-footer -->
                </div>
            </div>

            <div class="col-md-4">
                <div class="card ">
                    <div class="card-header">
                        <h3 class="card-title">Recently Added Products</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>

                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <ul class="products-list product-list-in-card pl-2 pr-2">


                            @foreach ($products as $key => $item)
                                <li class="item">
                                    <div class="product-img">
                                        <div class="img-size-50">

                                            {{ $key }}
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="javascript:void(0)" class="product-title">{{ $item->name }}
                                            <span class="badge badge-warning float-right">
                                                @if ($item->special_price != null)
                                                    ${{ $item->special_price }}
                                                    <s class="cutprice">${{ $item->price }}</s>
                                                @else
                                                    ${{ $item->price }}
                                                @endif


                                            </span>
                                        </a>
                                        <span class="product-description">
                                            {{ $item->category->name }}
                                        </span>
                                    </div>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer text-center">
                        <a href="{{ route('products.index') }}" class="uppercase">View All Products</a>
                    </div>
                    <!-- /.card-footer -->
                </div>
            </div>

        </div>




        <script>
            $(document).on('click', '.pagination a', function(event) {
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                $('tbody').addClass('animate__animated animate__fadeOut');

                // console.log(href);
                paginated(page)
                // getMoreUsers(page);
            });

            function paginated(page) {


                $.ajax({
                    type: "POST",
                    url: "home/ajaxSearch" + "?page=" + page,
                    dataType: 'JSON',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {

                    },
                    success: function(responese) {
                        $('tbody').removeClass('animate__animated animate__fadeOut');

                        // console.log(responese.pagination)
                        $('#areatbody').html(responese.data);
                        $('tbody').addClass('animate__animated animate__fadeIn');

                        $('#wow').html(responese.pagination);
                    },
                });
            }
        </script>
        <script>
            $('#infoxboxx1').hover(
                function() {
                    $(this).addClass('animate__fadeOut')
                },
                function() {
                    $(this).removeClass('animate__fadeOut')
                }
            )
            $('#infoxboxx2').hover(
                function() {
                    $(this).addClass('animate__fadeOut')
                },
                function() {
                    $(this).removeClass('animate__fadeOut')
                }
            )

            $('#infoxboxx3').hover(
                function() {
                    $(this).addClass('animate__fadeOut')
                },
                function() {
                    $(this).removeClass('animate__fadeOut')
                }
            )

            $('#infoxboxx4').hover(
                function() {
                    $(this).addClass('animate__fadeOut')
                },
                function() {
                    $(this).removeClass('animate__fadeOut')
                }
            )
        </script>

    </section>
@endsection
