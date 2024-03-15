@extends('admin.layouts.app')
@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class=" heading col-sm-6">
                    <h1>Lead Assgin</h1>
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
                                <form action="{{ route('orders.index') }}" style="display: flex;">
                                    <input type="text" name="keyword" id="keyword" class="form-control check"
                                        placeholder="Search" style="height:93%; width:40%; margin-left:auto;">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default mr-2  "><i
                                                class="fas fa-search"></i></button>
                                </form>

                                {{-- <a href="{{ route('orders.create') }}"><button type="button"
                                        class="btn btn-primary rounded-pill rounded-bill">Add
                                        Lead Assign</button></a> --}}
                            </div>
                        </div>
                    </div>


                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table  table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>User Name</th>
                                <th>User Contact</th>
                                <th>Order Total</th>
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
                                    <td>{{ $item->user->name }}</td>
                                    <td>{{ $item->user->phone }}</td>
                                    <td>{{ $item->order_total }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>{{ $item->delivery_fee }}</td>
                                    <td>{{ $item->extra_comments }}</td>
                                    <td>{{ $item->method }}</td>
                                    <td>{{ $item->paid }}</td>

                                    {{-- <td>
                                        <select name="lead_status" id="" onchange="changeLeadStatus(this,{{$item->lead->id}})">
                                            @foreach ($lead_statuses as $item1)
                                                <option @if ($item1->id == $item->lead->lead_status) selected @endif value="{{$item1->id}}">{{ $item1->name}}</option>
                                            @endforeach
                                        </select>
                                    </td> --}}
                                    <td>
                                        <a href="{{ route('orders.edit', $item->id) }}" class="float-left"><i
                                                class="fas fa-edit"></i></a>
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
    function changeLeadStatus(element,id){
        $.ajax({
                type: "POST",
                url: "{{route('changeleadstatus')}}",
                dataType: 'JSON',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    'id': id,
                    'lead_status': $(element).val(),
                },
                success: function(responese) {
                    // console.log(responese.pagination)

                },
            });
    }
</script>
@endsection
