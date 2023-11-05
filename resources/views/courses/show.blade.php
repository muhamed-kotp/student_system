@extends('layout')

@section('title')
    {{ $course->name }}
@endsection
@section('content')
    <div class="d-none">{{ $x = 1 }}</div>
    <div class="my-5 mx-3 d-flex  flex-column">
        <div>
            <h1> Course Name :{{ $course->name }}</h1>
            <h3> Course Code :{{ $course->code }}</h3>
            <h3> Course Description :{{ $course->description }}</h3>
            {{-- <h5> Student Birth Date :{{ $student->birthDate }}</h5> --}}
        </div>


        {{-- {{ $course->students }} --}}
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Code</th>
                        <th scope="col">BirthDate</th>
                        <th scope="col">Email</th>
                    </tr>
                </thead>
                <tbody id="courses-cont">
                    @foreach ($course->students as $student)
                        <tr class="table-warning">

                            <th scope="row">{{ $x }}</th>
                            <td><a href="{{ route('students.show', $student->id) }}"> {{ $student->name }} </a></td>
                            <td>{{ $student->code }}</td>
                            <td>{{ $student->date }}</td>
                            <td>{{ $student->email }}</td>

                        </tr>
                        <div class="d-none">{{ $x++ }}</div>
                    @endforeach
                </tbody>
            </table>
        </div>


        {{-- <div class="d-flex justify-content-evenly align-items-center">
            <a class="btn btn-info mx-3" href="{{ route('students.index') }}">Back</a>
            <a class="btn btn-success mx-3" href="{{ route('students.edit', $student->id) }}">Update</a>
            <a class="btn btn-danger mx-3" href="{{ route('students.delete', $student->id) }}">Delete</a>
        </div> --}}
    </div>
@endsection
