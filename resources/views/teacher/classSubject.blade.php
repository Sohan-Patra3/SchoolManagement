@extends('layout.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">

                        <h1>MY CLASS & SUBJECT</h1>
                    </div>


                </div>

                

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
                                <h1 class="card-title">My class & subject</h1>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Sl.no</th>
                                            <th>Class Name</th>
                                            <th>Subject Name</th>
                                            <th>Subject Type</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($list as $data)
                                            @foreach ($data->class->subjects as $subject)
                                                <tr>
                                                    <td>{{ $loop->parent->iteration }}</td>
                                                    <td>{{ $data->class->name }}</td>
                                                    <td>{{ $subject->name }}</td>
                                                    <td>{{ $subject->type }}</td>
                                                </tr>
                                            @endforeach
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
