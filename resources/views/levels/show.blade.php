@extends('layout')

@section('title')
    {{ $level->name }}
@endsection
@section('content')
    <div class="my-5 mx-3 d-flex justify-content-evenly ">
        <div>

            <h2> Level Name :{{ $level->name }}</h1>
                <h5> Level Number :{{ $level->number }}</h5>
                <h5> Level Description :{{ $level->description }}</h5>



                <h2>the Students In {{ $level->name }} :-</h2>
                <ol class="list-group list-group-numbered">
                    @foreach ($students as $student)
                        @if ($student->level_id == $level->id)
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 d-flex justify-content-between w-100">
                                    <h5 class="fw-bold"><a
                                            href="{{ route('students.show', $student->id) }}">{{ $student->name }}</a></h5>
                                    <span class=" fw-bold badge bg-primary rounded-pill p-2">{{ $student->code }}</span>
                                </div>
                            </li>
                        @endif
                    @endforeach
                </ol>


        </div>
        <div class="d-flex justify-content-evenly align-items-center">
            <a class="btn btn-info mx-3" href="{{ route('levels.index') }}">Back</a>

        </div>
    </div>
@endsection
