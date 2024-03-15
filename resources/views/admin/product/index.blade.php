@extends('admin.layouts.app')
@section('content')



    <section class="content-header">
        <style></style>
        <div class="container-fluid" style="">
            <div class="row mb-2">
                <div class="filtersdiv">



                    <div class="filters row" style="display:none;">
                        <div class="col-md-12">

                        </div>

                    </div>
                </div>

                <div class=" heading col-sm-6">
                    <h1>product</h1>
                </div>
                <div class="col-sm-2">
                    <span data-toggle="tooltip" title="Filter" class="filterbtn"><i id="icon" class='fas fa-angle-down'
                            style='font-size:25px;color:#13547a;padding-bottom: 1%'></i></span>
                </div>
                <div class="offset-sm-2  col-sm-2">
                    <h1 class="float-sm-right"><span id="total"
                            style="background-image: linear-gradient(121deg, #13547a 1%, #80d0c7 250%);color: white"
                            class="badge badge-pill">{{ $products->total() }}</span></h1>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="container-fluid">

        {{-- <button class="btn1 info filterbtn"><i class='fas fa-angle-right' style='color:red'></i></button> --}}
        <div class="row">

            <div class="col-12">
                <div class="card searcharea">
                    <div class="align-right" style="position: fixed; z-index: 2; margin-left: 79%">
                        {{-- href="{{ route('products.edit', $item->id) }}" --}}
                        <a id="editselected" style="display: none">
                            <button class="btn btn-sm btn-success">
                                <i class="fas fa-edit" style="color: white"></i> Edit
                            </button>
                        </a>

                        <button onclick="deleteItems()" id="dltselected" style="display: none"
                            class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i> Delete <span id="dltbadge"
                                class="badge badge-light"></span></button>
                    </div>
                    <div class="card-header" style="padding-left:1%">

                        <br>
                        <div class="card-tools">
                            <div class="input-group input-group-sm">
                                <form style="display: flex;" action="{{ route('products.index') }}">
                                    <div class="input-group border rounded-pill m-1 ">
                                        <input name="keyword" id="keyword" type="search" placeholder="Search"
                                            aria-describedby="button-addon3" class="form-control bg-none border-0">
                                        <div class="input-group-append border-0">
                                            <button type="button" id="button-addon3" type="button"
                                                class="btn btn-link text-blue"><i class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>



                                {{-- <a href="{{ route('products.import') }}"><button type="button"
                                        class="btn btn-danger rounded-pill specialbutton m-1">Import products</button></a> --}}
                                <a href="{{ route('products.create') }}"><button type="button"
                                        class="btn btn-primary rounded-pill rounded-bill m-1">Add product</button></a>

                            </div>
                        </div>

                        {{-- DateModal --}}
                        <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog modal-dialog-centered ">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <meta name="csrf-token" content="{{ csrf_token() }}" />
                                    <div class="modal-header">
                                        <h4 class="modal-title">Edit Visit Date</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <input id="productid" type="hidden">
                                        <input id="visitdate" type="datetime-local">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" onclick="saveVisitDate()" class="btn btn-default1"
                                            data-dismiss="modal">Save</button>
                                    </div>
                                </div>

                            </div>
                        </div>


                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr> <input type="hidden" id="sort_from">
                                    <th onclick="sortBy('id')"># <i style="display: none" id="sort_by_icon"
                                            class="fas fa-sort-up"></i> <input type="hidden" id="sort_by"></th>
                                    <th>Category</th>
                                    <th id="thname">Name</th>
                                    <th>SKU</th>
                                    <th>Price</th>
                                    <th>Featured</th>
                                    <th>Slug</th>
                                    <th>Status</th>
                                    <th>In Stock</th>
                                    <th onclick="sortBy('created_at')">Created At <i style="display: none"
                                            id="sort_by_iconcreated" class="fas fa-sort-up"><input type="hidden"
                                                id="sort_by_created"></th>


                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <div id="productss">
                                    @include('admin.product.ajaxtable')
                                </div>
                            </tbody>
                        </table>
                        <div id="wow" class="align-right paginationstyle">
                            {{ $products->links() }}
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->


                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
    </div>



@endsection
