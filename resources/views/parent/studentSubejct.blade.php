@extends('layout.app')

@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <h1>Student Subjects</h1>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            @if ($students->isEmpty())
                                <p>No students found for this parent.</p>
                            @else
                                @foreach ($students as $student)
                                    <h2 style="color: blue">{{ $student->name }} {{ $student->last_name }}(Class:
                                        {{ $student->class->name }})
                                    </h2>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Subject Name</th>
                                                <th>Subject Type</th>
                                                <th>Class Name</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($student->class->subjects as $subject)
                                                <tr>
                                                    <td>{{ $subject->name }}</td>
                                                    <td>{{ $subject->type }}</td>
                                                    <td>{{ $student->class->name }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
