@extends('layout')

@section('title')
    All Levels
@endsection
@section('content')
    <a class="btn btn-outline-primary my-5 mx-5 " href="{{ route('levels.create') }}">Create new Level</a>
    @foreach ($levels as $level)
        <div class="mb-3 mx-3 d-flex justify-content-evenly ">
            <div>

                <h1> Level Name :{{ $level->name }}</h1>
                <h3> Level Number :{{ $level->number }}</h3>
                <h3> Level Description :{{ $level->description }}</h3>
            </div>
            <div class="d-flex justify-content-evenly align-items-center">
                <a class="btn btn-info mx-3" href="{{ route('levels.show', $level->id) }}">View</a>
            </div>
        </div>
        <hr />
    @endforeach
@endsection
