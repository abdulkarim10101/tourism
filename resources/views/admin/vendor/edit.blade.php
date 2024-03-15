@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid ">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12 ">
                <!-- general form elements -->
                <!-- /.card -->
                <!-- Form Element sizes -->
                <!-- /.card -->
                <!-- /.card -->
                <!-- Input addon -->
                <!-- /.card -->
                <!-- Horizontal Form -->
                <div class="card card-info black">
                    <div class="card-header">
                        <h3 class="card-title">Add Vendor</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="col-md-8 " >
                        <form action="{{ route('vendors.update',$vendor->id) }}" method="POST" class="form-horizontal"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">

                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">User</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="user_id" id="user_id">
                                            @foreach ($users as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>

                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Brand Name</label>
                                    <div class="col-sm-6">
                                        <input required type="text" name="brand_name" class="form-control" value="{{$vendor->brand_name}}">
                                    </div>

                                </div>


                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-6">
                                        <input required type="text" name="email" class="form-control" value="{{$vendor->email}}">
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <label for="password" class="col-sm-2 col-form-label">Mobile</label>
                                    <div class="col-sm-6">
                                        <input required type="text" name="mobile" class="form-control" value="{{$vendor->mobile}}">
                                    </div>

                                </div>


                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Phone</label>
                                    <div class="col-sm-6">
                                        <input required type="number" name="phone" class="form-control" value="{{$vendor->phone}}">
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <label for="password" class="col-sm-2 col-form-label">Website Url</label>
                                    <div class="col-sm-6">
                                        <input required type="text" name="website_url" class="form-control" value="{{$vendor->website_url}}">
                                    </div>

                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-sm-2 col-form-label">Bank Name</label>
                                    <div class="col-sm-6">
                                        <input required type="text" name="bank_name" class="form-control" value="{{$vendor->bank_name}}">
                                    </div>

                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-sm-2 col-form-label">Account Holder Name</label>
                                    <div class="col-sm-6">
                                        <input required type="text" name="bank_account_name" class="form-control" value="{{$vendor->bank_account_name}}">
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <label for="password" class="col-sm-2 col-form-label">Account Number</label>
                                    <div class="col-sm-6">
                                        <input required type="text" name="bank_account_number" class="form-control" value="{{$vendor->bank_account_number}}">
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Status</label>
                                    <div class="col-sm-6">
                                        <select required class="form-control" name="status" id="status">
                                            <option disabled selected>Select</option>
                                            <option value="1">Active</option>
                                            <option value="0">In Active</option>

                                        </select>
                                    </div>


                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Address</label>
                                    <div class="col-sm-6">
                                        <textarea required class="form-control" name="address" id="" cols="30"
                                            rows="8">{{$vendor->address}}</textarea>
                                    </div>

                                </div>

                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn btn-info">Submit</button>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            {{-- <div class="card-footer">
                                <button type="submit" class="btn btn-default float-right">Cancel</button>
                            </div>
                            <!-- /.card-footer --> --}}
                        </form>
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <!--/.col (left) -->
            <!-- right column -->
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </div>
@endsection
