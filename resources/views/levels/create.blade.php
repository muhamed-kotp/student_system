@extends('layout')

@section('title')
    Create New Student
@endsection

@section('content')
    <div class="container"style="margin-bottom: 250px; margin-top: 50px">
        <form method="POST" action="{{ route('levels.store') }}">

            @csrf
            <div class="mb-3">
                <label class="form-label fs-2">Level Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                    placeholder="Enter Level Name">
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

            </div>
            <div class="mb-3">
                <label class="form-label fs-2">Level description</label>
                <input type="text" name="description" class="form-control" value="{{ old('description') }}"
                    placeholder="Please enter Level description">
                @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label fs-2">Level number</label>
                <input type="text" name="number" class="form-control" value="{{ old('number') }}"
                    placeholder="Please enter Level Number">
                @error('number')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
