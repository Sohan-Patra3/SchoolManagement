@extends('layout.app')

@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <h1>Add New Student</h1>
                <!-- /.col -->
                <div class="col-md-12">

                    <div class="card">
                        <div class="card card-primary">
                            <form action="{{ url('editStduent', $student->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">

                                        <div class="form-group col-md-6">
                                            <label for="nameInput">First Name <span style="color: red">*</span></label>
                                            <input type="text" class="form-control" id="nameInput"
                                                placeholder="Enter your first name" name="name" required
                                                value="{{ $student->name }}">

                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="nameInput">Last Name <span style="color: red">*</span></label>
                                            <input type="text" class="form-control" id="nameInput"
                                                placeholder="Enter your last name" name="last_name" required
                                                value="{{ $student->last_name }}">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="nameInput">Addmission Number <span
                                                    style="color: red">*</span></label>
                                            <input type="text" class="form-control" id="nameInput"
                                                placeholder="Enter Addmission Number" name="addmission_number" required
                                                value="{{ $student->addmission_number }}">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="nameInput">Roll Number</label>
                                            <input type="text" class="form-control" id="nameInput"
                                                placeholder="Enter Roll Number" name="roll_number"
                                                value="{{ $student->roll_number }}">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="nameInput">Class<span style="color: red">*</span></label>
                                            <select name="class_id" id="" required class="form-control">
                                                <option value="{{ $student->class_id }}">Select Class</option>
                                                @foreach ($class as $class)
                                                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="nameInput">Gender<span style="color: red">*</span></label>
                                            <select name="gender" id="" required class="form-control">
                                                <option value="{{ $student->gender }}">Select Gender</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                                <option value="other">Other</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="nameInput">Date of birth<span style="color: red">*</span></label>
                                            <input type="date" class="form-control" id="nameInput" placeholder=""
                                                name="date_of_birth" required value="{{ $student->date_of_birth }}">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="nameInput">Caste</label>
                                            <input type="text" class="form-control" id="nameInput"
                                                placeholder="Enter your caste" name="caste"
                                                value="{{ $student->caste }}">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="nameInput">Religion</label>
                                            <input type="text" class="form-control" id="nameInput"
                                                placeholder="Enter Religion" name="religion"
                                                value="{{ $student->religion }}">
                                        </div>


                                        <div class="form-group col-md-6">
                                            <label for="nameInput">Mobile Number<span style="color: red">*</span></label>
                                            <input type="number" class="form-control" id="nameInput"
                                                placeholder="Enter Mobile Number" name="mobile_number" required
                                                value="{{ $student->mobile_number }}">
                                        </div>


                                        <div class="form-group col-md-6">
                                            <label for="nameInput">Addmission Date <span
                                                    style="color: red">*</span></label>
                                            <input type="date" class="form-control" id="nameInput" placeholder=""
                                                name="addmission_date" required value="{{ $student->addmission_date }}">
                                        </div>


                                        <div class="form-group col-md-6">
                                            <label for="nameInput">Profile Picture</label>
                                            <input type="file" class="form-control" id="nameInput" placeholder=""
                                                name="profile_pic" value="{{ $student->profile_pic }}">
                                            <img src="/products/{{ $student->profile_pic }}" alt=""
                                                width="50" height="50">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="nameInput">Blood Group<span style="color: red">*</span></label>
                                            <select name="blood_group" id="" required class="form-control">
                                                <option value="{{ $student->blood_group }}">Select Blood Group</option>
                                                <option value="A+">A+</option>
                                                <option value="B+">B+</option>
                                                <option value="AB+">AB+</option>
                                                <option value="AB-">AB-</option>
                                                <option value="B-">B-</option>
                                                <option value="O+">O+</option>
                                                <option value="O-">O-</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="nameInput">Height<span style="color: red">*</span></label>
                                            <input type="number" class="form-control" id="nameInput"
                                                placeholder="Height" name="height" required
                                                value="{{ $student->height }}">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="nameInput">Weight<span style="color: red">*</span></label>
                                            <input type="number" class="form-control" id="nameInput"
                                                placeholder="weight" name="weight" required
                                                value="{{ $student->weight }}">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="nameInput">Status</label>
                                            <select name="status" id="" class="form-control">
                                                <option value="{{ $student->status }}">Select Status</option>
                                                <option value="0">Active</option>
                                                <option value="1">Inactive</option>
                                            </select>
                                        </div>

                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label for="emailInput">Email <span style="color: red">*</span></label>
                                        <input type="email" class="form-control" id="emailInput"
                                            placeholder="Enter email" name="email" required
                                            value="{{ $student->email }}">

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
