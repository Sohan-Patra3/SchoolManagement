@extends('layout.app')

@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <h1>Add New Class Timetable</h1>
                <!-- /.col -->
                <div class="col-md-12">
                    <div class="card">
                        <div class="card card-primary">
                            <form action="{{ url('/insertAssingSubject') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="nameInput">Class Name</label>
                                        <select name="class_id" class="form-control">
                                            <option value="">Select Class</option>
                                            @foreach ($class as $value)
                                                <option value="{{ $value->id }}">{{ $value->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="nameInput">Subject Name</label>
                                        <select name="class_id" class="form-control">
                                            <option value="">Select Subject</option>
                                            @foreach ($subject as $value)
                                                <option value="{{ $value->id }}">{{ $value->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>




                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Search</button>
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
