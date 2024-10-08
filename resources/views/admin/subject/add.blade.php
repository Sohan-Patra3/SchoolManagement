@extends('layout.app')

@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <h1>Add New Subject</h1>
                <!-- /.col -->
                <div class="col-md-12">
                    <div class="card">
                        <div class="card card-primary">
                            <form action="{{ url('/insertSubject') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="nameInput">Subject Name</label>
                                        <input type="text" class="form-control" id="nameInput" placeholder="Enter class"
                                            name="name">
                                    </div>



                                    <div class="form-group">
                                        <label for="">Type</label>
                                        <select name="type" class="form-control" required>
                                            <option value="">Select Subject Type</option>
                                            <option value="Theory">Theory</option>
                                            <option value="Practical">Practical</option>
                                        </select>
                                    </div>



                                    <div class="form-group">
                                        <label for="">Status</label>
                                        <select name="status" class="form-control">
                                            <option value="0">Active</option>
                                            <option value="1">InActive</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
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
