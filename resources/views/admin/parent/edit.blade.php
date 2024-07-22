@extends('layout.app')

@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h1>Edit Parent</h1>
                </div>
            </div>

            <div class="col-md-12">
                @include('message')
                <div lass="col-md-12">
                    <div class="card">
                        <div class="card-header card-primary">
                            <h3>Edit Parent Information</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ url('editParent', $parent->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="firstNameInput">First Name <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" id="firstNameInput"
                                            placeholder="Enter your first name" name="name" required
                                            value="{{ $parent->name }}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="lastNameInput">Last Name</label>
                                        <input type="text" class="form-control" id="lastNameInput"
                                            placeholder="Enter your last name" name="last_name"
                                            value="{{ $parent->last_name }}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="occupationInput">Occupation</label>
                                        <input type="text" class="form-control" id="occupationInput"
                                            placeholder="Enter your occupation" name="occupation"
                                            value="{{ $parent->occupation }}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="nameInput">Gender<span style="color: red">*</span></label>
                                        <select name="gender" id="" required class="form-control"
                                            value={{ $parent->gender }}>
                                            <option value="">Select Gender</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="other">Other</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="addressInput">Address</label>
                                        <input type="text" class="form-control" id="addressInput"
                                            placeholder="Enter address" name="address" value="{{ $parent->address }}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="mobileNumberInput">Mobile Number <span
                                                style="color: red">*</span></label>
                                        <input type="number" class="form-control" id="mobileNumberInput"
                                            placeholder="Enter Mobile Number" name="mobile_number" required
                                            value="{{ $parent->mobile_number }}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="profilePicInput">Profile Picture</label>
                                        <input type="file" class="form-control" id="profilePicInput" name="profile_pic"
                                            value={{ $parent->profile_pic }}>
                                        <img src="/products/{{ $parent->profile_pic }}" alt="" width="50"
                                            height="50" class="mt-1">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="statusInput">Status</label>
                                        <select name="status" id="statusInput" class="form-control"
                                            value="{{ $parent->status }}">
                                            <option value="">Select Status</option>
                                            <option value="0" @if ($parent->status == 0) selected @endif>Active
                                            </option>
                                            <option value="1" @if ($parent->status == 1) selected @endif>
                                                Inactive</option>
                                        </select>
                                    </div>
                                    <hr>
                                    <div class="form-group col-md-12">
                                        <label for="emailInput">Email <span style="color: red">*</span></label>
                                        <input type="email" class="form-control" id="emailInput" placeholder="Enter email"
                                            name="email" required value="{{ $parent->email }}">
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
