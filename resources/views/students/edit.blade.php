@extends('layout')

@section('title')
    Edit Student
@endsection

@section('content')
    <div class="container"style="margin-bottom: 250px; margin-top: 50px">
        <form method="POST" action="{{ route('students.update', $student->id) }}">

            @csrf
            <div class="mb-3">
                <label class="form-label fs-2">Student Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') ?? $student->name }}"
                    placeholder="Enter Student Name">
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror


            </div>
            <div class="mb-3">
                <label class="form-label fs-2">Student Email</label>
                <input type="text" name="email" class="form-control" value="{{ old('email') ?? $student->email }}"
                    placeholder="Please enter Student Email">
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label fs-2">Student code</label>
                <input type="text" name="code" class="form-control" value="{{ old('code') ?? $student->code }}"
                    placeholder="Please enter Student Code">
                @error('code')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label fs-2">Student birthday Date</label>
                <input type="text" name="date" class="form-control" value="{{ old('date') ?? $student->birthDate }}"
                    placeholder="Please enter Student Birth day date">
                @error('date')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="dropdown mb-3">
                <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="level_id"
                    value="{{ old('level_id') }}">
                    <option>Level</option>
                    <option value="1" {{ $student->level_id == 1 ? 'selected' : '' }}>Level One</option>
                    <option value="2" {{ $student->level_id == 2 ? 'selected' : '' }}>Level Two</option>
                    <option value="3" {{ $student->level_id == 3 ? 'selected' : '' }}>Level Three</option>
                    <option value="4" {{ $student->level_id == 4 ? 'selected' : '' }}>Level Four</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
