@extends('admin.layouts.app')
@section('content')

    <style>
        input[type=checkbox] {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            -webkit-tap-highlight-color: transparent;
            cursor: pointer;
        }

        input[type=checkbox]:focus {
            outline: 0;
        }

        .toggle {
            height: 32px;
            width: 52px;
            border-radius: 16px;
            display: inline-block;
            position: relative;
            margin: 0;
            border: 2px solid #474755;
            background: linear-gradient(180deg, #2D2F39 0%, #1F2027 100%);
            transition: all 0.2s ease;
        }

        .toggle:after {
            content: "";
            position: absolute;
            top: 2px;
            left: 2px;
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background: white;
            box-shadow: 0 1px 2px rgba(44, 44, 44, 0.2);
            transition: all 0.2s cubic-bezier(0.5, 0.1, 0.75, 1.35);
        }

        .toggle:checked {
            background: linear-gradient(180deg, #0ba503 0%, #1F2027 100%);
        }

        .toggle:checked:after {
            transform: translatex(20px);
        }

    </style>
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <!-- /.card -->
                <!-- Form Element sizes -->
                <!-- /.card -->
                <!-- /.card -->
                <!-- Input addon -->
                <!-- /.card -->
                <!-- Horizontal Form -->

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
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Add Product</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form action="{{ route('scrapper.index') }}">
                                        @csrf

                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <!-- textarea -->

                                                <div class="form-group">
                                                    <label class="col-sm-3 col-form-label">Link</label>
                                                    <input required type="text" name="link" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 col-form-label">Featured</label>
                                                    <select required name="featured" class="form-control">
                                                        <option value="0">No</option>
                                                        <option value="1">Yes</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="col-sm-3 col-form-label">Category</label>
                                                    <select required name="category_id" class="form-control">
                                                        <option selected disabled value="0">None</option>
                                                        @foreach ($categories as $item)
                                                            <option value="{{ $item->id }}">{{ $item->name }} ->
                                                                {{ optional($item->parent)->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>





                                        <div class="row">
                                            <div class="col-sm-6">
                                                <!-- textarea -->
                                                <div class="form-group">
                                                    <input type="submit" value="Submit" class="btn btn-primary">
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                                <!-- /.card-body -->
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
