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
                                <div id="account-details" class="tab-pane fade in active show in active show">
                                    <div class="block block-dashboard-info">
                                        <div class="block-title">Account Information</div>
                                        <div class="block-content">

                                            <div class="row">
                                                <div class="col-lg-6 col-sm-12">
                                                    <div class="box box-information">
                                                        <div class="box-title"><span>Contact Information</span></div>
                                                        <div class="box-content">
                                                            <p>{{$customer->name}}
                                                                <br> {{$customer->email}}

                                                            </p>
                                                        </div>
                                                        <div class="box-actions"><a class="action edit"
                                                                href="{{route('customer.account_information')}}"><span>Edit</span></a> <a href="{{route('customer.account_information')}}"
                                                                class="action change-password">Change Password</a></div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-sm-12">
                                                    <div class="box box-newsletter">
                                                        <div class="box-title"><span>Contact Number</span></div>
                                                        <div class="box-content">
                                                            <p> {{$customer->phone}} </p>
                                                        </div>
                                                        <div class="box-actions"><a class="action edit"
                                                                href="{{route('customer.account_information')}}"><span>Edit</span></a></div>
                                                    </div>
                                                </div>
                                            </div>




                                        </div>
                                    </div>

                                    <div class="block block-dashboard-addresses mt-5">
                                        <div class="block-title">
                                            <div>Address Book</div> <a class="action edit" href="#."><span>Manage
                                                    Addresses</span></a>
                                        </div>
                                        <div class="block-content">
                                            <div class="row">
                                                <div class="col-lg-6 col-sm-12">

                                                    <div class="box box-billing-address">
                                                        <div class="box-title"><span>Default Billing Address</span>
                                                        </div>
                                                        <div class="box-content">
                                                            @if ($customer->primary_address!=null)
                                                            <address>{{$customer->primary_address}}</address>
                                                            @else
                                                            <address>You have not set a default billing address.</address>

                                                            @endif
                                                        </div>
                                                        <div class="box-actions"><a class="action edit" href="{{route('customer.account_information')}}"
                                                                data-ui-id="default-billing-edit-link"><span>Edit
                                                                    Address</span></a></div>
                                                    </div>

                                                </div>

                                                <div class="col-lg-6 col-sm-12">
                                                    <div class="box box-shipping-address">
                                                        <div class="box-title"><span>Default Shipping Address</span>
                                                        </div>
                                                        <div class="box-content">
                                                            @if ($customer->primary_address!=null)
                                                            <address>{{$customer->primary_address}}</address>
                                                            @else
                                                            <address>You have not set a default billing address.</address>

                                                            @endif
                                                        </div>
                                                        <div class="box-actions"><a class="action edit" href="{{route('customer.account_information')}}"
                                                                data-ui-id="default-shipping-edit-link"><span>Edit
                                                                    Address</span></a></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection
