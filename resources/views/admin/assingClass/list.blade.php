@extends('layout.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">

                        <h1>ASSING CLASS LIST</h1>
                    </div>
                    <div class="col-sm-6" style="text-align: right">
                        <a href="{{ url('admin/assing_class/add') }}" class="btn btn-primary">New Assing</a>
                    </div>

                </div>

                <form action="{{ url('admin/assingClass/search') }}" method="GET">
                    <div class="form-group">
                        <input type="text" class="form-control" id="nameInput" placeholder="Search Teacher's name"
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
                                @include('message')
                                <h1 class="card-title">Assing Class</h1>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Sl.no</th>
                                            <th>Class Name</th>
                                            <th>Teacher Name</th>
                                            <th>Created By</th>
                                            <th>Status</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($list as $data)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $data->class->name }}</td>
                                                <td>{{ $data->user->name }}</td>
                                                <td>{{ $data->createdBy->name }}</td>
                                                <td>
                                                    @if ($data->status == 0)
                                                        Active
                                                    @else
                                                        Inactive
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ url('admin/assingClass/edit', $data->id) }}"
                                                        class="btn btn-primary">Edit</a>
                                                    <a href="{{ url('admin/assingClass/delete', $data->id) }}"
                                                        class="btn btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

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
