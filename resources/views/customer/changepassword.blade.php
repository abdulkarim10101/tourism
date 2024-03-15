@extends('frontend.layouts.app')
@section('content')
    <!-- ========== MAIN CONTENT ========== -->
    <main id="content" role="main">
        <!-- breadcrumb -->
        <div class="bg-gray-13 bg-md-transparent">
            <div class="container">
                <!-- breadcrumb -->
                <div class="my-md-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="/">Home</a>
                            </li>
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">My Account
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
                <h1 class="text-center">Change Password</h1>
            </div>
            <div class="my-4 my-xl-8">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-5">
                        <!-- Title -->
                        <!-- <div class="border-bottom border-color-1 mb-6">
                            <h3 class="d-inline-block section-title mb-0 pb-2 font-size-26">Change Password</h3>
                        </div> -->

                        <!-- End Title -->
                        <form class="js-validate" novalidate="novalidate"
                            action="{{ route('customers.changepassword') }}" method="post">
                            @csrf
                            <!-- Form Group -->
                            <div class="js-form-message form-group">
                                <label class="form-label" for="signinSrPasswordExample2">Password <span
                                        class="text-danger">*</span></label>
                                <input type="password" class="form-control" name="old_password"
                                    id="signinSrPasswordExample2" placeholder="Password" aria-label="Password" required
                                    data-msg="Your password is invalid. Please try again." data-error-class="u-has-error"
                                    data-success-class="u-has-success">
                            </div>
                            <!-- End Form Group -->

                            <!-- Form Group -->
                            <div class="js-form-message form-group">
                                <label class="form-label" for="signinSrPasswordExample2">Confirm Password <span
                                        class="text-danger">*</span></label>
                                <input type="password" class="form-control" name="new_password"
                                    id="signinSrPasswordExample2" placeholder="Confirm Password" aria-label="Password"
                                    required data-msg="Your password is invalid. Please try again."
                                    data-error-class="u-has-error" data-success-class="u-has-success">
                            </div>
                            <!-- End Form Group -->


                            <!-- End Checkbox -->

                            <!-- Button -->
                            <div class="mb-1">
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary-dark-w px-5">Save</button>
                                </div>

                            </div>
                            <!-- End Button -->
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </main>
    <!-- ========== END MAIN CONTENT ========== -->
@endsection
