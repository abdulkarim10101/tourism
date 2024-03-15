@extends('admin.layouts.app')
@section('content')




    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12">

                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">User</h3>
                    </div>

                    <div class="col-md-8">
                        <form action="{{ route('orders.store') }}" method="POST" class="form-horizontal"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">

                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Users</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="user_id">
                                            <option disabled selected value="">Select ID</option>

                                            @foreach ($users as $user)
                                                <option value="{{$user->id}}">{{$user->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Lead ID</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="lead_id">
                                            <option disabled selected value="">Select ID</option>
                                            @foreach ($leads as $item)
                                                <option @if ($leadAssign->lead_id == $item->id) selected @endif value="{{ $item->id }}">
                                                    {{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Client's Feedback</label>
                                    <div class="col-sm-6">
                                        <textarea required class="form-control" id="client_feedback" name="client_feedback"
                                            placeholder="Enter Client's Feedback" rows="4">{{$leadAssign->client_feedback}}</textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Realtor's Feedback</label>
                                    <div class="col-sm-6">
                                        <textarea required class="form-control" id="realtor_feedback" name="realtor_feedback"
                                            placeholder="Enter Realtor's Feedback" rows="4">{{$leadAssign->realtor_feedback}}</textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-8">
                                        <input type="password" class="form-control" id="inputPassword3"
                                            placeholder="Password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck2">
                                            <label class="form-check-label" for="exampleCheck2">Remember me</label>
                                        </div>
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
