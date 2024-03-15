@extends('admin.layouts.app')
@section('content')

    <style></style>


    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12">

                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">User</h3>
                    </div>

                    <div class="col-md-8">
                        <form action="{{ route('categories.store') }}" method="POST" class="form-horizontal"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">

                                <div class="form-group row d-none">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Parent</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="parent_id">
                                            <option selected value="">Select Category</option>

                                            @foreach ($categories as $item)
                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row d-none">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Featured</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="featured">
                                            <option value="0">No</option>
                                            <option value="1">Yes</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="name" class="form-control" id="inputPassword3"
                                            placeholder="Enter Category">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Image</label>
                                    <div class="col-sm-8">
                                        <input required type="file" class="form-control" accept="image/*"
                                                        name="image" placeholder="address">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">

                                        <button  type="submit" class="btn btn-info col-sm-7 rounded-bill rounded-pill">Submit</button>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>

            </div>


        </div>

    </div>
@endsection
