@extends('admin.layouts.app')
@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="heading col-sm-6">
                    <h1>Wish List</h1>
                </div>
                <div class="offset-sm-4 col-sm-2">
                    <h1 class="float-sm-right">
                        {{-- <span style="background-image: linear-gradient(121deg, #13547a 1%, #80d0c7 250%);
                        color: white;" class="badge badge-pill">{{ $wishlist->total() }}</span> --}}
                    </h1>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card searcharea">
                    <div class="align-right">
                    </div>
                    <div class="card-header">
                        <br>
                        {{-- <div class="card-tools">
                            <div class="input-group input-group-sm">
                                <form action="{{ route('wishlist.index') }}" style="display: flex;">
                                    <div class="input-group border rounded-pill ">
                                        <input name="keyword" type="search" placeholder="Search"
                                            aria-describedby="button-addon3" class="form-control bg-none border-0">
                                        <div class="input-group-append border-0">
                                            <button id="button-addon3" type="button" class="btn btn-link text-blue"><i
                                                    class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>

                                <a href="{{ route('wishlist.create') }}"><button type="button"
                                        class="btn btn-primary rounded-pill rounded-bill">Add
                                    </button></a>
                            </div>
                        </div> --}}

                    </div>

                    <div class="card-body table-responsive p-0">
                        <table class="table Status table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">Image</th>
                                    <th class="product-name">Product</th>
                                    <th class="product-name">SKU</th>
                                    <th class="product-price">Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($wishlist as $item)

                                    <tr class="">

                                        <td class="d-none d-md-table-cell">
                                            <a href="{{ route('shop.productdetail', $item->product->slug) }}">
                                                <img style="width: 70px; height: 70px;"
                                                    class="img-fluid max-width-100 p-1 border border-color-1"
                                                    src="{{ asset('image') }}/{{ $item->product->images[0]->images }}"
                                                    alt="Image Description">
                                            </a>
                                        </td>

                                        <td data-title="Product">
                                            <a href="{{ route('shop.productdetail', $item->product->slug) }}"
                                                class="text-gray-90">{{ $item->product->name }}</a>
                                        </td>


                                        <td data-title="SKUNUMBER">
                                            <span class="">#{{ $item->product->sku }}</span>
                                        </td>
                                        <td data-title="
                                                Price">
                                            <span class="">
                                                @if ($item->special_price != null)
                                                ${{ $item->special_price }}
                                                <s class="cutprice">${{ $item->price }}</s>
                                            @else
                                                ${{ $item->price }}
                                            @endif

                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="
                                                6" class="border-top space-top-2 justify-content-center">

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        {{-- <div class="align-right paginationstyle">
                            {{ $wishlists->links() }}
                        </div> --}}
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
