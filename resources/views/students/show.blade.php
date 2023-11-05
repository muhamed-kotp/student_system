@extends('layout')

@section('title')
    {{ $student->name }}
@endsection
@section('content')
    <div class="my-5 mx-3 d-flex justify-content-evenly ">
        <div>

            <h1> Student Name :{{ $student->name }}</h1>
            <h3> Student Code :{{ $student->code }}</h3>
            <h3> Student Email :{{ $student->email }}</h3>
            <h5> Student Birth Date :{{ $student->birthDate }}</h5>
        </div>
        <div class="d-flex justify-content-evenly align-items-center">
            <a class="btn btn-info mx-3" href="{{ route('students.index') }}">Back</a>
            <a class="btn btn-success mx-3" href="{{ route('students.edit', $student->id) }}">Update</a>
            <a class="btn btn-danger mx-3" href="{{ route('students.delete', $student->id) }}">Delete</a>
        </div>
    </div>
    <hr />
@endsection
