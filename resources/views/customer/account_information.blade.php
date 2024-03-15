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
                                <div id="addressbook" class="tab-pane fade in active show">
                                    <!-- Billing Form -->

                                    <div class="block block-dashboard-info">
                                        <div class="block-title">Account Information</div>

                                    </div>
                                    <form action="{{route('customer.update',auth()->user()->id)}}" method="POST">
                                        @csrf
                                        @method('put')
                                    <div class="row mt-5 padding-ownsrow">
                                        <div class="col-md-6">
                                            <!-- Input -->
                                            <div class="js-form-message mb-6">
                                                <label class="form-label">
                                                    First name
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <input value="{{auth()->user()->first_name}}" type="text" class="form-control" name="first_name"
                                                    placeholder="Jack" aria-label="Jack" required=""
                                                    data-msg="Please enter your frist name." data-error-class="u-has-error"
                                                    data-success-class="u-has-success" autocomplete="off">
                                            </div>
                                            <!-- End Input -->
                                        </div>

                                        <div class="col-md-6">
                                            <!-- Input -->
                                            <div class="js-form-message mb-6">
                                                <label class="form-label">
                                                    Last name
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <input value="{{auth()->user()->last_name}}" type="text" class="form-control" name="last_name"
                                                    placeholder="Wayley" aria-label="Wayley" required=""
                                                    data-msg="Please enter your last name." data-error-class="u-has-error"
                                                    data-success-class="u-has-success">
                                            </div>
                                            <!-- End Input -->
                                        </div>
                                        <div class="col-md-6">
                                            <!-- Input -->
                                            <div class="js-form-message mb-6">
                                                <label class="form-label">
                                                    Email address
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <input value="{{auth()->user()->email}}" type="email" class="form-control" name="email"
                                                    placeholder="jackwayley@gmail.com" aria-label="jackwayley@gmail.com"
                                                    required="" data-msg="Please enter a valid email address."
                                                    data-error-class="u-has-error" data-success-class="u-has-success">
                                            </div>
                                            <!-- End Input -->
                                        </div>

                                        <div class="col-md-6">
                                            <!-- Input -->
                                            <div class="js-form-message mb-6">
                                                <label class="form-label">
                                                    Phone
                                                </label>
                                                <input required value="{{auth()->user()->phone}}" type="text" name="phone" class="form-control" placeholder="+1 (062) 109-9222"
                                                    aria-label="+1 (062) 109-9222" data-msg="Please enter your last name."
                                                    data-error-class="u-has-error" data-success-class="u-has-success">
                                            </div>
                                            <!-- End Input -->
                                        </div>

                                        <div class="w-100"></div>



                                        <div class="col-md-6">
                                            <!-- Input -->
                                            <div class="js-form-message mb-6">
                                                <label class="form-label">
                                                    City
                                                    <span class="text-danger">*</span>
                                                </label>
                                                @include('frontend.layouts.cities')
                                            </div>
                                            <!-- End Input -->
                                        </div>

                                        <div class="col-md-6">
                                            <!-- Input -->
                                            <div class="js-form-message mb-6">
                                                <label class="form-label">
                                                    Postcode/Zip
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <input value="{{auth()->user()->postal_code}}" type="number" class="form-control" name="postal_code"
                                                    placeholder="99999" aria-label="99999"
                                                    data-msg="Please enter a postcode or zip code."
                                                    data-error-class="u-has-error" data-success-class="u-has-success">
                                            </div>
                                            <!-- End Input -->
                                        </div>

                                        <div class="w-100"></div>

                                        <div class="col-md-12">
                                            <!-- Input -->
                                            <div class="js-form-message mb-6">
                                                <label class="form-label">
                                                    State
                                                    <span class="text-danger">*</span>
                                                </label>
                                                @include('frontend.layouts.states')
                                            </div>
                                            <!-- End Input -->
                                        </div>

                                        <div class="col-md-12">
                                            <!-- Input -->
                                            <div class="js-form-message mb-6">
                                                <label class="form-label">
                                                    Address
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <textarea name="primary_address" class="form-control" id="" cols="30"
                                                    rows="6">{{auth()->user()->primary_address}}</textarea>
                                            </div>
                                            <!-- End Input -->
                                        </div>


                                        <div class="w-100"></div>
                                        <div class="col-lg-3 col-sm-6">

                                            <button
                                                class="btn btn-primary-dark-w mb-3 mb-md-0 font-weight-normal px-5 px-md-4 px-lg-5 w-100 w-md-auto"><strong>Save</strong></button>
                                        </div>
                                    </div>
                                    <!-- End Billing Form -->
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
