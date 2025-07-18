@extends('layouts.app')

@section('title', 'Course Selector | Ezy')

@section('content')
    <div class="container py-5">
        <h1 class="text-center mb-4" style="color: #0148A9">Choose The
            <span style="color:#fd7e14 ">
                Course
            </span>
        </h1>

        <div class="d-flex justify-content-between align-items-center">
            <img src="{{ asset('photos/left.jpg') }}" alt="Left Picture" style="max-width: 45%; height: auto;">
            <img src="{{ asset('photos/right.jpg') }}" alt="Right Picture" style="max-width: 45%; height: auto;">
        </div>
    </div>
@endsection
