@extends('admin.layouts.app')
@section('content')
    <style>
        .pull-right {
            margin-left: 92%;
        }
    </style>
    <div class="row">

        @if (Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif
        @if (Session::has('danger'))
            <div class="alert alert-danger">
                {{ Session::get('danger') }}
            </div>
        @endif
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Order Details</h4>
                    {{-- <p class="card-description"> Add class <code>.table-striped</code> </p> --}}
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th> id </th>
                                <th> SKU </th>
                                <th> Product Name </th>
                                <th> Price </th>
                                <th> Qty </th>
                                <th> Sub_total </th>
                                {{-- <th> Total </th> --}}
                                {{-- <th> Status </th> --}}
                                {{-- <th> Priority </th> --}}
                                <th></th>
                                <th> Action </th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $item)
                                <tr>
                                    {{-- <td class="py-1"> --}}
                                    {{-- <img src="../../../assets/images/faces-clipart/pic-1.png" alt="image" /> </td> --}}
                                    <td> {{ $item->id }} </td>
                                    <td>{{ $item->sku }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->product->price }}</td>
                                    <td> {{ $item->qty }}</td>
                                    <td> {{ $item->sub_total }} </td>
                                    {{-- <td> {{$item->total}} </td>
                  <td> {{$item->status == 1 ? 'Active' : 'Inactive'}} </td> --}}
                                    <td><a href="{{ route('products.index') }}?keyword={{ $item->name }}">
                                            <i class="fas fa-eye"></i>
                                        </a></td>
                                    <td>

                                        <a href="{{ route('orderdetails.edit', $item->id) }}" class="float-left"><i
                                                class="fas fa-edit"></i></a>
                                        <form action="{{ route('orderdetails.destroy', $item->id) }}" method="POST">
                                            @method('delete') @csrf <button class="btn btn-link pt-0"><i
                                                    class="fas fa-trash-alt"></i></button> </form>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                        @if (isset($item))
                            <tfoot>
                                <th>Total</th>
                                <th>{{ $item->order->order_total }}</th>
                            </tfoot>
                            <tfoot>
                                <th>Customer Name</th>
                                <th>{{ $item->order->user->name }}</th>
                            </tfoot>
                            <tfoot>
                                <th>Customer Contact</th>
                                <th>{{ $item->order->user->phone }}</th>
                            </tfoot>
                            <tfoot>
                                <th>Status</th>
                                <th>{{ $item->order->status }}</th>
                            </tfoot>
                            <tfoot>
                                <th>Address</th>
                                <th>{{ $item->order->address }}</th>
                            </tfoot>
                        @endif

                    </table>
                </div>
            </div>
        </div>

    </div>


    {{-- ---------------------------------------------------------------------------------- --}}

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="col-md-12" action="{{ route('orders.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">


                        <div class="form-group">
                            <input class="form-control" type="text" name="name" placeholder="Enter Category Name">

                        </div>
                        <select class="form-control selectpicker" data-live-search="true" selectAllText="true"
                            data-style="form-control" name="parent_id">
                            <option selected disabled value="0">None</option>
                            @foreach ($orders as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach

                        </select>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="submit">Create Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- ---------------------------------------------------------------------------------- --}}
@endsection
@section('scripts')
    <script>
        $('a').on('click', function() {
            var id = $(this).prop('id');
            var url = '{{ route('orders.edit', ':id') }}';
            url = url.replace(':id', id);
            $.ajax({
                type: "GET",
                url: url,
                dataType: "json",
                success: function(data) {
                    console.log(data);
                }
            });
        })
    </script>
@endsection
