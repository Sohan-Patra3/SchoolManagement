@extends('layout.app')

@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <h1>My Account</h1>
                <div class="col-md-12">
                    @include('message')
                    <div class="card">
                        <div class="card card-primary">
                            <form action="{{ url('updateMyAccountedit', $student->id) }}" method="POST"
                                enctype="multipart/form-data">
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
                                            <label for="nameInput">Last Name </label>
                                            <input type="text" class="form-control" id="nameInput"
                                                placeholder="Enter your last name" name="last_name"
                                                value="{{ $student->last_name }}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="nameInput">Date of Birth<span style="color: red">*</span></label>
                                            <input type="date" class="form-control" id="nameInput" name="date_of_birth"
                                                required value="{{ $student->date_of_birth }}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="nameInput">Gender<span style="color: red">*</span></label>
                                            <select name="gender" required class="form-control">
                                                <option value="" disabled>Select Gender</option>
                                                <option value="male" {{ $student->gender == 'male' ? 'selected' : '' }}>
                                                    Male</option>
                                                <option value="female" {{ $student->gender == 'female' ? 'selected' : '' }}>
                                                    Female</option>
                                                <option value="other" {{ $student->gender == 'other' ? 'selected' : '' }}>
                                                    Other</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="nameInput">Caste</label>
                                            <input type="text" class="form-control" id="nameInput"
                                                placeholder="Enter your caste" name="caste" value="{{ $student->caste }}">
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
                                            <label for="nameInput">Profile Picture</label>
                                            <input type="file" class="form-control" id="nameInput" name="profile_pic">
                                            <img src="/products/{{ $student->profile_pic }}" alt="" width="50"
                                                height="50">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="nameInput">Blood Group<span style="color: red">*</span></label>
                                            <select name="blood_group" required class="form-control">
                                                <option value="" disabled>Select Blood Group</option>
                                                <option value="A+"
                                                    {{ $student->blood_group == 'A+' ? 'selected' : '' }}>A+</option>
                                                <option value="B+"
                                                    {{ $student->blood_group == 'B+' ? 'selected' : '' }}>B+</option>
                                                <option value="AB+"
                                                    {{ $student->blood_group == 'AB+' ? 'selected' : '' }}>AB+</option>
                                                <option value="AB-"
                                                    {{ $student->blood_group == 'AB-' ? 'selected' : '' }}>AB-</option>
                                                <option value="B-"
                                                    {{ $student->blood_group == 'B-' ? 'selected' : '' }}>B-</option>
                                                <option value="O+"
                                                    {{ $student->blood_group == 'O+' ? 'selected' : '' }}>O+</option>
                                                <option value="O-"
                                                    {{ $student->blood_group == 'O-' ? 'selected' : '' }}>O-</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="nameInput">Height<span style="color: red">*</span></label>
                                            <input type="number" class="form-control" id="nameInput" placeholder="Height"
                                                name="height" required value="{{ $student->height }}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="nameInput">Weight<span style="color: red">*</span></label>
                                            <input type="number" class="form-control" id="nameInput"
                                                placeholder="Weight" name="weight" required
                                                value="{{ $student->weight }}">
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
