@extends('layout.app')

@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <h1>Add New Student</h1>
                <!-- /.col -->
                <div class="col-md-12">
                    <div class="card">
                        <div class="card card-primary">
                            <form action="{{ url('insertStduent') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="nameInput">Name</label>
                                        <input type="text" class="form-control" id="nameInput"
                                            placeholder="Enter your name" name="name">
                                    </div>

                                    <div class="form-group">
                                        <label for="emailInput">Email</label>
                                        <input type="email" class="form-control" id="emailInput" placeholder="Enter email"
                                            name="email">
                                        {{ $errors->first('email') }}
                                    </div>

                                    <div class="form-group">
                                        <label for="passwordInput">Password</label>
                                        <input type="password" class="form-control" id="passwordInput"
                                            placeholder="Password" name="password">
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
