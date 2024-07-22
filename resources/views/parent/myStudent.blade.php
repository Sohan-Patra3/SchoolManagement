@extends('layout.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">

                        <h1>MY STUDENT LIST</h1>
                    </div>

                    {{-- <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Simple Tables</li>
                        </ol>
                    </div> --}}
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
                                <h1 class="card-title">My Student List</h1>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Sl.no</th>
                                            <th>Profile Picture</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Addimission No</th>
                                            <th>Roll No</th>
                                            <th>Class</th>
                                            <th>Gender</th>
                                            <th>DOB</th>
                                            <th>Caste</th>
                                            <th>Religion</th>
                                            <th>Mobile No</th>
                                            <th>Addmission Date</th>
                                            <th>Blood Group</th>
                                            <th>Height</th>
                                            <th>Weight</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($parent->children as $student)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <img style="border-radius:50%"
                                                        src="/products/{{ $student->profile_pic }}" alt=""
                                                        height="50" width="50">
                                                </td>
                                                <td>{{ $student->name }}</td>
                                                <td>{{ $student->email }}</td>
                                                <td>{{ $student->addmission_number }}</td>
                                                <td>{{ $student->roll_number }}</td>
                                                <td>
                                                    {{ $student->class->name }}
                                                </td>
                                                <td>{{ $student->gender }}</td>
                                                <td>{{ $student->date_of_birth }}</td>
                                                <td>{{ $student->caste }}</td>
                                                <td>{{ $student->religion }}</td>
                                                <td>{{ $student->mobile_number }}</td>
                                                <td>{{ $student->addmission_date }}</td>
                                                <td>{{ $student->blood_group }}</td>
                                                <td>{{ $student->height }}</td>
                                                <td>{{ $student->weight }}</td>


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
