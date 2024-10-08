@extends('layout.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>ASSING SUBJECT LIST</h1>
                    </div>
                    <div class="col-sm-6" style="text-align: right">
                        <a href="{{ url('admin/assing_subject/add') }}" class="btn btn-primary">Add New Assing Subject</a>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                @include('message')
                                <h1 class="card-title">Assing Subject List</h1>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Sl.no</th>
                                            <th>Class Name</th>
                                            <th>Subject Name</th>
                                            <th>Status</th>
                                            <th>Created By</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($list as $value)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $value->class->name }}</td>
                                                <td>{{ $value->subject->name }}</td>
                                                <td>
                                                    @if ($value->status == 0)
                                                        Active
                                                    @else
                                                        InActive
                                                    @endif
                                                </td>
                                                <td>{{ $value->user->name }}</td>
                                                <td>
                                                    <a href="{{ url('admin/assing_subject/edit', $value->id) }}"
                                                        class="btn btn-primary">Edit</a>
                                                    <a href="{{ url('admin/assing_subject/delete', $value->id) }}"
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
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
