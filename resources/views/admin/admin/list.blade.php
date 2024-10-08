@extends('layout.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        @include('message')
                        <h1>ADMIN LIST</h1>
                    </div>
                    <div class="col-sm-6" style="text-align: right">
                        <a href="{{ url('admin/admin/add') }}" class="btn btn-primary">Add New Admin</a>
                    </div>
                    {{-- <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Simple Tables</li>
                        </ol>
                    </div> --}}
                </div>
                <form action="{{ url('admin/admin/search') }}" method="GET">
                    <div class="form-group">
                        <input type="text" class="form-control" id="nameInput" placeholder="Search Admin name"
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
                                <h1 class="card-title">Admin List</h1>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Sl.no</th>
                                            <th>Admin Name</th>
                                            <th>Email</th>
                                            <th>Create Date</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $admin)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $admin->name }}</td>
                                                <td>{{ $admin->email }}</td>
                                                <td>{{ $admin->created_at }}</td>
                                                <td><a href="{{ url('admin/admin/edit', $admin->id) }}"
                                                        class="btn btn-primary">Edit</a></td>
                                                <td><a href="{{ url('admin/admin/delete', $admin->id) }}"
                                                        class="btn btn-danger">Delete</a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="div_deg" style="float: right">
                                    {{ $data->links() }}
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
