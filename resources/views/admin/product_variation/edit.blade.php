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
                        <form action="{{ route('orders.update',$leadAssign->id) }}" method="POST" class="form-horizontal"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="card-body">



                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Notes</label>
                                    <div class="col-sm-6">
                                        <textarea required class="form-control" id="notes" name="notes"
                                            placeholder="Enter Notes" rows="4">{{$leadAssign->notes}}</textarea>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">

                                        <button  type="submit" class="btn btn-info col-sm-7">Submit</button>
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
