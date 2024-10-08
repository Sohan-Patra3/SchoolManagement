@extends('layout.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>STUDENT LIST</h1>
                    </div>
                    <div class="col-sm-6" style="text-align: right">
                        <a href="{{ url('admin/student/add') }}" class="btn btn-primary">Add New Student</a>
                    </div>
                </div>
                <form action="{{ url('admin/student/search') }}" method="GET">
                    <div class="form-group">
                        <input type="text" class="form-control" id="nameInput" placeholder="Search Student name"
                            name="search">
                        <input type="submit" value="Search" class="btn btn-primary mt-2">
                    </div>
                </form>

                @include('message')
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h1 class="card-title">Student List</h1>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Sl.no</th>
                                            <th>Profile Picture</th>
                                            <th>Name</th>
                                            <th>Parent Name</th>
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
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $student)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td><img style="border-radius:50%"
                                                        src="/products/{{ $student->profile_pic }}" alt=""
                                                        height="50" width="50"></td>
                                                <td>{{ $student->name }} {{ $student->last_name }}</td>
                                                <td>
                                                    @foreach ($student->parent as $child)
                                                        {{ $child->name }} {{ $child->last_name }}<br>
                                                    @endforeach
                                                </td>
                                                </td>
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
                                                <td>
                                                    @if ($student->status == 0)
                                                        Active
                                                    @else
                                                        Inactive
                                                    @endif
                                                </td>

                                                <td><a href="{{ url('admin/student/edit', $student->id) }}"
                                                        class="btn btn-primary">Edit</a>
                                                    <a href="{{ url('admin/student/delete', $student->id) }}"
                                                        class="btn btn-danger mt-1">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix">
                                <div class="float-right">
                                    {{ $data->links() }}
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
