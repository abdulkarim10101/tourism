@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">


                <div class="container-fluid ">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-12 ">

                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Add Product</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form action="{{ route('products.store') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <!-- text input -->
                                                <div class="form-group">
                                                    <label class="col-sm-3 col-form-label">Name</label>
                                                    <input type="text" name="name" id="name"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <!-- text input -->
                                                <div class="form-group">
                                                    <label class="col-sm-3 col-form-label">Slug</label>
                                                    <input type="text" name="slug" id="slug"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <!-- text input -->
                                                <div class="form-group">
                                                    <label class="col-sm-3 col-form-label">Buying Price</label>
                                                    <input type="number" name="buying_price" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="col-sm-3 col-form-label">Price</label>
                                                    <input type="number" name="price" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-9">
                                                <!-- textarea -->
                                                <div class="form-group">
                                                    <label class="col-sm-3 col-form-label">Description</label>
                                                    <textarea id="editor" type="text" name="description" class="form-control" rows=20 cols=50></textarea>
                                                </div>
                                            </div>

                                        </div>


                                        <div class="row">


                                        </div>

                                        <hr>
                                        <div class="row d-none">
                                            <div class="col-sm-6">
                                                <!-- textarea -->
                                                <div class="form-group">
                                                    <label class="col-sm-3 col-form-label">Special Price From:</label>
                                                    <input disabled type="date" name="special_price_from"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="col-sm-3 col-form-label">Special Price To:</label>
                                                    <input disabled type="date" name="special_price_to"
                                                        class="form-control">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row d-none">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="col-sm-3 col-form-label">Special Price</label>
                                                    <input disabled type="number" name="special_price"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="col-sm-3 col-form-label">Type</label>
                                                    <select disabled name="type" class="form-control">
                                                        <option selected value="single">Single</option>
                                                        <option value="variable">Variable</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row d-none">


                                            <div class="col-sm-6">
                                                <!-- textarea -->
                                                <div class="form-group">
                                                    <label class="col-sm-3 col-form-label">Priority:</label>
                                                    <select name="priority" class="form-control">
                                                        <option value="1">Top</option>
                                                        <option value="2">Medium</option>
                                                        <option value="3">Low</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="col-sm-3 col-form-label">Status</label>
                                                    <select name="status" class="form-control">
                                                        <option value="1">Active</option>
                                                        <option value="0">Inactive</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <!-- textarea -->
                                                <div class="form-group">
                                                    <label class="col-sm-3 col-form-label">Featured</label>
                                                    <select name="featured" class="form-control">
                                                        <option value="0">No</option>
                                                        <option value="1">Yes</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="col-sm-3 col-form-label">Category</label>
                                                    <select required name="category_id" class="form-control">
                                                        <option selected disabled value="">None</option>
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
                                                    <label class="col-sm-3 col-form-label">Quantity</label>
                                                    <input readonly type="number" name="qty" class="form-control"
                                                        value="0">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="col-sm-3 col-form-label">In-Stock</label>
                                                    <select name="in_stock" class="form-control">
                                                        <option value="1">Yes</option>
                                                        <option value="0">No</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <!-- textarea -->
                                                <div class="form-group">
                                                    <label class="col-sm-3 col-form-label">Main Image</label>
                                                    <input required type="file" class="form-control" accept="image/*"
                                                        name="main_images[]" placeholder="address" multiple>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <!-- textarea -->
                                                <div class="form-group">
                                                    <label class="col-sm-3 col-form-label">Images</label>
                                                    <input type="file" class="form-control" accept="image/*"
                                                        name="images[]" placeholder="address" multiple>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    {{-- <label class="col-sm-3 col-form-label">Video</label>
                                                    <input type="file" class="form-control" name="video"
                                                        placeholder="address"> --}}
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
                {{-- <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script> --}}
                {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor5/40.0.0/ckeditor.min.js"></script> --}}
                <script src="https://cdn.ckeditor.com/4.7.1/full/ckeditor.js"></script>
                <script>
                    CKEDITOR.replace('editor', {
                        allowedContent: true,
                        //removePlugins: 'pastefromword,pastetext,tableselection,clipboard'
                    });
                </script>

                <style>
                    .mce-notification {
                        display: none !important;
                    }

                    .ck-editor__editable {
                        min-height: 300px;
                        min-width: 600px;

                    }
                </style>

                <script>
                    // Get references to the input fields
                    var nameInput = document.getElementById('name');
                    var slugInput = document.getElementById('slug');

                    // Function to generate slug from name
                    function generateSlug(name) {
                        return name.trim().toLowerCase().replace(/\s+/g, '-');
                    }

                    // Event listener to update slug when name changes
                    nameInput.addEventListener('input', function() {
                        var name = nameInput.value;
                        var slug = generateSlug(name);
                        slugInput.value = slug;
                    });
                </script>
            @endsection
