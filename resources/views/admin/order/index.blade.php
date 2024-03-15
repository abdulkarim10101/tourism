@extends('admin.layouts.app')
@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class=" heading col-sm-6">
                    <h1>Orders</h1>
                </div>
                <div class=" offset-sm-4  col-sm-2">
                    <h1 class="float-sm-right"><span style="background-image: linear-gradient(121deg,black  1%, white 300%);
                                color: white;" class="badge badge-pill">{{ $orders->total() }}</span></h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="container-fluid">
        <div class="row">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <div class="col-12">
                <div class="card searcharea">
                    <div class="align-right">
                    </div>
                    <div class="card-header" style="padding-left:1% ">
                        {{-- <h3 class="card-title"><button style="padding: 3px" type="button" class="btn btn-primary">
                                TOTAL <span class="badge badge-pill badge-light">{{$count}}</span>
                            </button></h3>
                        <br> --}}

                        <div class="card-tools">
                            <div class="input-group input-group-sm">
                                <form style="display: flex;" action="{{ route('orders.index') }}">
                                    <div class="input-group border rounded-pill m-1 ">
                                        <input name="keyword" id="keyword" type="search" placeholder="Search"
                                            aria-describedby="button-addon3" class="form-control bg-none border-0">
                                        <div class="input-group-append border-0">
                                            <button type="button" id="button-addon3" type="button"
                                                class="btn btn-link text-blue"><i class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                    </div>


                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table  table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>SKU</th>
                                <th>User Name</th>
                                <th>User Contact</th>
                                <th>Order Total</th>
                                <th>Promo Code</th>
                                <th>Discount</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Delivery Fee</th>
                                <th>Message</th>
                                <th>Method</th>
                                <th>Paid</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($orders as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->sku }}</td>
                                    <td>{{ $item->user->name }}</td>
                                    <td>{{ $item->user->phone }}</td>
                                    <td>{{ $item->order_total }}</td>
                                    <td>{{ optional($item->promo)->name }}</td>
                                    <td>{{ optional($item->promo)->discount_percentage }}%</td>
                                    <td>{{ $item->total }}</td>

                                    <td>
                                        <select name="" id="" onchange="changeOrderStatus(this,{{ $item->id }})">
                                            @foreach ($order_statuses as $item1)
                                                <option @if ($item->status == $item1->name) selected @endif value="{{ $item1->name }}">
                                                    {{ $item1->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>{{ $item->delivery_fee }}</td>
                                    <td>{{ $item->extra_comments }}</td>
                                    <td>{{ $item->method }}</td>
                                    <td>{{ $item->paid }}</td>


                                    <td>
                                        <a href="{{ route('orders.show', $item->id) }}" class="float-left"><i
                                                class="fas fa-eye"></i></a>
                                        {{-- <a href="{{ route('orders.edit', $item->id) }}" class="float-left"><i
                                                class="fas fa-edit"></i></a> --}}
                                        <form action="{{ route('orders.destroy', $item->id) }}" method="POST">
                                            @method('delete') @csrf <button class="btn btn-link pt-0"><i
                                                    class="fas fa-trash-alt"></i></button> </form>
                                    </td>
                                </tr>
                            @empty
                                <p>No Data Found</p>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="align-right paginationstyle">
                        {{ $orders->links() }}
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
    <script>
        function changeOrderStatus(element, id) {
            $.ajax({
                type: "POST",
                url: "{{ route('changeorderstatus') }}",
                dataType: 'JSON',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    'id': id,
                    'status': $(element).val(),
                },
                success: function(responese) {
                    // console.log(responese.pagination)

                },
            });
        }
    </script>
@endsection
