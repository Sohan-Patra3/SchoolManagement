@extends('layout.app')

@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <h1>Add New Parent</h1>
                <!-- /.col -->
                <div class="col-md-12">

                    <div class="card">
                        <div class="card card-primary">
                            <form action="{{ url('insertParent') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">

                                        <div class="form-group col-md-6">
                                            <label for="nameInput">First Name <span style="color: red">*</span></label>
                                            <input type="text" class="form-control" id="nameInput"
                                                placeholder="Enter your first name" name="name" required>

                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="nameInput">Last Name</label>
                                            <input type="text" class="form-control" id="nameInput"
                                                placeholder="Enter your last name" name="last_name">
                                        </div>


                                        <div class="form-group col-md-6">
                                            <label for="nameInput">Gender<span style="color: red">*</span></label>
                                            <select name="gender" id="" required class="form-control">
                                                <option value="">Select Gender</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                                <option value="other">Other</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="nameInput">Occupation</label>
                                            <input type="text" class="form-control" id="nameInput"
                                                placeholder="Enter your occupation" name="occupation">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="nameInput">Address</label>
                                            <input type="text" class="form-control" id="nameInput"
                                                placeholder="Enter address" name="address">
                                        </div>


                                        <div class="form-group col-md-6">
                                            <label for="nameInput">Mobile Number<span style="color: red">*</span></label>
                                            <input type="number" class="form-control" id="nameInput"
                                                placeholder="Enter Mobile Number" name="mobile_number" required>
                                        </div>


                                        <div class="form-group col-md-6">
                                            <label for="nameInput">Profile Picture</label>
                                            <input type="file" class="form-control" id="nameInput" placeholder=""
                                                name="profile_pic">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="nameInput">Status</label>
                                            <select name="status" id="" class="form-control">
                                                <option value="">Select Status</option>
                                                <option value="0">Active</option>
                                                <option value="1">Inactive</option>
                                            </select>
                                        </div>

                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label for="emailInput">Email <span style="color: red">*</span></label>
                                        <input type="email" class="form-control" id="emailInput" placeholder="Enter email"
                                            name="email" required>

                                    </div>

                                    <div class="form-group">
                                        <label for="passwordInput">Password <span style="color: red">*</span></label>
                                        <input type="password" class="form-control" id="passwordInput"
                                            placeholder="Password" name="password" required>
                                    </div>



                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
