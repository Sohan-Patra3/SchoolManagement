@extends('layout.app')

@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <h1>Assing Class</h1>
                <!-- /.col -->
                <div class="col-md-12">
                    <div class="card">
                        <div class="card card-primary">
                            <form action="{{ url('/assingClass') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="">Class Name</label>
                                        <select name="class_id" class="form-control" required>
                                            <option value="">Select Class</option>
                                            @foreach ($class as $name)
                                                <option value="{{ $name->id }}">{{ $name->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>



                                    <div class="form-group">
                                        <label for="">Teacher's</label>
                                        @foreach ($teacher as $data)
                                            <div>
                                                <label style="font-weight: normal">
                                                    <input type="checkbox" value="{{ $data->id }}"
                                                        name="teacher_ids[]">{{ $data->name }}
                                                </label>
                                            </div>
                                        @endforeach

                                    </div>



                                    <div class="form-group">
                                        <label for="">Status</label>
                                        <select name="status" class="form-control">
                                            <option value="0">Active</option>
                                            <option value="1">InActive</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- /.card-body -->

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
