@extends('layout.app')

@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <h1>Update Teacher</h1>
                <!-- /.col -->
                <div class="col-md-12">

                    <div class="card">
                        <div class="card card-primary">
                            <form action="{{ url('updateTeacher', $teacher->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">

                                        <div class="form-group col-md-6">
                                            <label for="firstNameInput">First Name <span style="color: red">*</span></label>
                                            <input type="text" class="form-control" id="firstNameInput"
                                                placeholder="Enter your first name" name="name" required
                                                value="{{ $teacher->name }}">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="lastNameInput">Last Name </label>
                                            <input type="text" class="form-control" id="lastNameInput"
                                                placeholder="Enter your last name" name="last_name"
                                                value="{{ $teacher->last_name }}">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="genderInput">Gender<span style="color: red">*</span></label>
                                            <select name="gender" id="genderInput" required class="form-control">
                                                <option value="">Select Gender</option>
                                                <option value="male" {{ $teacher->gender == 'male' ? 'selected' : '' }}>
                                                    Male</option>
                                                <option value="female" {{ $teacher->gender == 'female' ? 'selected' : '' }}>
                                                    Female</option>
                                                <option value="other" {{ $teacher->gender == 'other' ? 'selected' : '' }}>
                                                    Other</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="dobInput">Date of Birth<span style="color: red">*</span></label>
                                            <input type="date" class="form-control" id="dobInput" name="date_of_birth"
                                                required value="{{ $teacher->date_of_birth }}">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="dojInput">Date of Joining<span style="color: red">*</span></label>
                                            <input type="date" class="form-control" id="dojInput" name="date_of_joining"
                                                required value="{{ $teacher->date_of_joining }}">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="mobileInput">Mobile Number<span style="color: red">*</span></label>
                                            <input type="number" class="form-control" id="mobileInput"
                                                placeholder="Enter Mobile Number" name="mobile_number" required
                                                value="{{ $teacher->mobile_number }}">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="maritalStatusInput">Marital Status<span
                                                    style="color: red">*</span></label>
                                            <select name="marital_status" id="maritalStatusInput" required
                                                class="form-control">
                                                <option value="">Select Status</option>
                                                <option value="married"
                                                    {{ $teacher->marital_status == 'married' ? 'selected' : '' }}>Married
                                                </option>
                                                <option value="unmarried"
                                                    {{ $teacher->marital_status == 'unmarried' ? 'selected' : '' }}>
                                                    Unmarried</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="profilePicInput">Profile Picture</label>
                                            <input type="file" class="form-control" id="profilePicInput"
                                                name="profile_pic" value="{{ $teacher->profile_pic }}">
                                            <img src="/products/{{ $teacher->profile_pic }}" alt="" width="50" height="50">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="addressInput">Address</label>
                                            <textarea class="form-control" name="address" id="addressInput" cols="30" rows="4">{{ $teacher->address }}</textarea>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="qualificationInput">Qualification</label>
                                            <textarea class="form-control" name="qualification" id="qualificationInput" cols="30" rows="4">{{ $teacher->qualification }}</textarea>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="workExperienceInput">Work Experience</label>
                                            <textarea class="form-control" name="work_experience" id="workExperienceInput" cols="30" rows="4">{{ $teacher->work_experience }}</textarea>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="noteInput">Note</label>
                                            <textarea class="form-control" name="note" id="noteInput" cols="30" rows="4">{{ $teacher->note }}</textarea>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="statusInput">Status</label>
                                            <select name="status" id="statusInput" class="form-control">
                                                <option value="">Select Status</option>
                                                <option value="0" {{ $teacher->status == 0 ? 'selected' : '' }}>
                                                    Active</option>
                                                <option value="1" {{ $teacher->status == 1 ? 'selected' : '' }}>
                                                    Inactive</option>
                                            </select>
                                        </div>

                                        <hr>
                                        <div class="form-group col-md-12">
                                            <label for="emailInput">Email <span style="color: red">*</span></label>
                                            <input type="email" class="form-control" id="emailInput"
                                                placeholder="Enter email" name="email" required
                                                value="{{ $teacher->email }}">
                                        </div>

                                    </div>
                                    <hr>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
