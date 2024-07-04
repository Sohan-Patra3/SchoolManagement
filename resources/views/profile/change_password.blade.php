@extends('layout.app')

@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <h1>Change Password</h1>
                <!-- /.col -->
                <div class="col-md-12">
                    <div class="card">
                        <div class="card card-primary">
                            @include('message')
                            <form action="{{ url('update_changePassword') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="nameInput">Old Password</label>
                                        <input type="password" class="form-control" id="nameInput"
                                            placeholder="Enter Password" name="old_password" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="nameInput">New Password</label>
                                        <input type="password" class="form-control" id="nameInput"
                                            placeholder="New Password" name="new_password" required>
                                    </div>


                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
