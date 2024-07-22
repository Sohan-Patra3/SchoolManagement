@extends('layout.app')

@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <h1>My Account</h1>
                <!-- /.col -->
                <div class="col-md-12">
                    @include('message')
                    <div class="card">
                        <div class="card card-primary">
                            <form action="{{ url('admin/account', $user->id) }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="nameInput">Name</label>
                                        <input type="text" class="form-control" id="nameInput"
                                            placeholder="Enter your name" name="name" value="{{ $user->name }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="emailInput">Email</label>
                                        <input type="email" class="form-control" id="emailInput" placeholder="Enter email"
                                            name="email" value="{{ $user->email }}">
                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
