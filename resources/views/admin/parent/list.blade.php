@extends('layout.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">

                        <h1>PARENTS LIST</h1>
                    </div>
                    <div class="col-sm-6" style="text-align: right">
                        <a href="{{ url('admin/parent/add') }}" class="btn btn-primary">Add New Parent</a>
                    </div>
                    {{-- <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Simple Tables</li>
                        </ol>
                    </div> --}}
                </div>
                <form action="{{ url('admin/parent/search') }}" method="GET">
                    <div class="form-group">
                        <input type="text" class="form-control" id="nameInput" placeholder="Search parent name"
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
                        @include('message')
                        <div class="card">
                            <div class="card-header">
                                <h1 class="card-title">Admin List</h1>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Sl.no</th>
                                            <th>Profile Pic</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Gender</th>
                                            <th>Phone</th>
                                            <th>Occupation</th>
                                            <th>Address</th>
                                            <th>Student Name</th>
                                            <th>Status</th>
                                            <th>Created date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($parent as $user)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td><img style="border-radius:50%" src="/products/{{ $user->profile_pic }}"
                                                        alt="" height="50" width="50"></td>
                                                </td>
                                                <td>{{ $user->name }} {{ $user->last_name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->gender }}</td>
                                                <td>{{ $user->mobile_number }}</td>
                                                <td>{{ $user->occupation }}</td>
                                                <td>{{ $user->address }}</td>
                                                <td>
                                                    @foreach ($user->children as $child)
                                                        {{ $child->name }} {{ $child->last_name }}<br>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @if ($user->status == 0)
                                                        Active
                                                    @else
                                                        Inactive
                                                    @endif
                                                </td>
                                                <td>{{ $user->created_at }}</td>
                                                <td><a href="{{ url('admin/parent/edit', $user->id) }}"
                                                        class="btn btn-primary">Edit</a>
                                                    <a href="{{ url('admin/parent/delete', $user->id) }}"
                                                        class="btn btn-danger ">Delete</a>
                                                    <a href="{{ url('admin/parent/mystudent', $user->id) }}"
                                                        class="btn btn-success ">My Student</a>
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="div_deg" style="float: right">
                                    {{-- {{ $data->links() }} --}}
                                </div>
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
