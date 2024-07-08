@extends('layout.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        @include('message')
                        <h1>TEACHER LIST</h1>
                    </div>
                    <div class="col-sm-6" style="text-align: right">
                        <a href="{{ url('admin/teacher/add') }}" class="btn btn-primary">Add New Teacher</a>
                    </div>
                    {{-- <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Simple Tables</li>
                        </ol>
                    </div> --}}
                </div>
                <form action="{{ url('admin/teacher/search') }}" method="GET">
                    <div class="form-group">
                        <input type="text" class="form-control" id="nameInput" placeholder="Search Teacher name"
                            name="search">
                        <input type="submit" value="search" class="btn btn-primary mt-2">
                    </div>
                </form>

            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <!-- /.col -->
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h1 class="card-title">Teacher List</h1>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Sl.no</th>
                                            <th>Profile Pic</th>
                                            <th>Teacher Name</th>
                                            <th>Email</th>
                                            <th>Gender</th>
                                            <th>Date of joining</th>
                                            <th>Marital Status</th>
                                            <th>Mobile Number</th>
                                            <th>Address</th>
                                            <th>Qualification</th>
                                            <th>Work Experience</th>
                                            <th>Status</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($teacher as $data)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <img src="/products/{{ $data->profile_pic }}" alt=""
                                                        width="50" height="50" style="border-radius: 50%">
                                                </td>
                                                <td>{{ $data->name }} {{ $data->last_name }}</td>
                                                <td>{{ $data->email }}</td>
                                                <td>{{ $data->gender }}</td>
                                                <td>{{ $data->date_of_joining }}</td>
                                                <td>{{ $data->marital_status }}</td>
                                                <td>{{ $data->mobile_number }}</td>
                                                <td>{{ $data->address }}</td>
                                                <td>{{ $data->qualification }}</td>
                                                <td>{{ $data->work_experience }}</td>
                                                <td>
                                                    @if ($data->status == 0)
                                                        Active
                                                    @else
                                                        Inactive
                                                    @endif
                                                </td>
                                                <td><a href="{{ url('admin/teacher/edit', $data->id) }}"
                                                        class="btn btn-primary">Edit</a>
                                                    <a href="{{ url('admin/teacher/delete', $data->id) }}"
                                                        class="btn btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{-- <div class="div_deg" style="float: right">
                                    {{ $data->links() }}
                                </div> --}}
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->


                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
