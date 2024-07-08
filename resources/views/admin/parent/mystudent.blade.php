@extends('layout.app')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">

                        <h1>PARENT STUDENT LIST</h1>
                    </div>


                </div>
                <form action="{{ url('admin/parent/mystudent') }}" method="GET">
                    <div class="form-group">
                        <input type="text" class="form-control" id="nameInput" placeholder="Search Student" name="search">
                        <input type="submit" value="search" class="btn btn-primary mt-2">
                    </div>
                </form>

            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <!-- /.col -->


                    <div class="col-md-12">

                        <div class="card">
                            <div class="card-header">
                                <h1 class="card-title">Student List</h1>

                            </div>

                            <div class="card-body p-0">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Sl.no</th>
                                            <th>Profile Pic</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Created date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    @foreach ($student as $stu)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <img src="/products/{{ $stu->profile_pic }}" alt="" width="50"
                                                    height="50">
                                            </td>
                                            <td>{{ $stu->name }} {{ $stu->last_name }}</td>
                                            <td>{{ $stu->email }}</td>
                                            <td>{{ $stu->created_at }}</td>
                                            <td>
                                                <a href="{{ url('admin/addParentStudent', ['parentId' => $id, 'studentId' => $stu->id]) }}"
                                                    class="btn btn-success">Add Student</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tbody>

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




                    {{-- <div class="col-md-12">
                        @include('message')
                        <div class="card">
                            <div class="card-header">
                                <h1 class="card-title">Parent Student List</h1>

                            </div>

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
                                                    @if ($user->status == 0)
                                                        Active
                                                    @else
                                                        Inactive
                                                    @endif
                                                </td>
                                                <td>{{ $user->created_at }}</td>
                                                <td>
                                                    <a href="{{ url('admin/parent/mystudent', $user->id) }}"
                                                        class="btn btn-success ">My Student</a>
                                                </td>

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
                    </div> --}}
                    <!-- /.col -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
@endsection
