@extends('layouts.app')

@section('title', 'My Courses')

@section('content')
    <div class="mycourses-section py-5">
        <div class="container">
            <h2 class="mb-4 fw-bold text-center">My Plan & Courses</h2>

            {{-- Plan Info --}}
            @if ($activePlan && $planData)
                <div class="card mb-4 shadow plan-info-card border-0">
                    <div class="card-body d-flex align-items-center">
                        <div class="plan-icon me-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="#2563eb" class="bi bi-award" viewBox="0 0 16 16"><path d="M9.669.864 8 0 6.331.864 5.5 2.598l-1.902.276-.276 1.902L0 8l1.322 2.224.276 1.902 1.902.276.831 1.734L8 16l1.669-.864.831-1.734 1.902-.276.276-1.902L16 8l-1.322-2.224-.276-1.902-1.902-.276-.831-1.734zM8 1.018l1.31.678.606 1.264 1.39.202.202 1.39 1.264.606.678 1.31-.678 1.31-1.264.606-.202 1.39-1.39.202-.606 1.264L8 14.982l-1.31-.678-.606-1.264-1.39-.202-.202-1.39-1.264-.606-.678-1.31.678-1.31 1.264-.606.202-1.39 1.39-.202.606-1.264L8 1.018z"/><path d="M8 4.5a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7zm0 1a2.5 2.5 0 1 1 0 5 2.5 2.5 0 0 1 0-5z"/></svg>
                        </div>
                        <div>
                            <h5 class="card-title text-primary fw-bold mb-1">Current Plan: {{ $planData->name }}</h5>
                            <p class="card-text mb-0">
                                <strong>Courses Allowed:</strong> {{ $planData->course_limit }}<br>
                                <strong>Plan Started:</strong> {{ \Carbon\Carbon::parse($activePlan->start_date)->format('M d, Y') }}<br>
                                <strong>Expires At:</strong> {{ \Carbon\Carbon::parse($activePlan->end_date)->format('M d, Y') }}
                            </p>
                        </div>
                    </div>
                </div>
            @else
                <div class="alert alert-warning text-center shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#ffc107" class="bi bi-exclamation-triangle me-2" viewBox="0 0 16 16"><path d="M7.938 2.016a.13.13 0 0 1 .125 0l6.857 11.856c.03.052.03.12 0 .172a.13.13 0 0 1-.125.07H1.205a.13.13 0 0 1-.125-.07.145.145 0 0 1 0-.172L7.938 2.016zm.862-1.49a1.13 1.13 0 0 0-1.6 0L.342 12.384c-.457.79.091 1.616.8 1.616h13.716c.708 0 1.256-.826.8-1.616L8.8.526z"/><path d="M7.002 11a1 1 0 1 0 2 0 1 1 0 0 0-2 0zm.93-2.481a.905.905 0 1 1 1.81 0l-.082.823a.823.823 0 0 1-1.646 0l-.082-.823z"/></svg>
                    You don't have an active plan. Please select a plan to start enrolling in courses.
                </div>
            @endif

            {{-- Courses --}}
            <div class="row mt-4">
                @forelse ($courses as $course)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card course-card h-100 shadow-sm border-0">
                            <div class="course-img-wrapper position-relative">
                                @if ($course->photo)
                                    <img src="{{ asset('storage/' . $course->photo) }}" class="card-img-top course-img" alt="Course Image">
                                @else
                                    <div class="course-img-placeholder d-flex align-items-center justify-content-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="#e0e7ef" class="bi bi-journal-bookmark" viewBox="0 0 16 16"><path d="M6 8V1h1v6.117l2.447-1.63.553.832-3 2z"/><path d="M2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2zm2-1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H4z"/></svg>
                                    </div>
                                @endif
                                @if (in_array($course->id, $enrolledCourseIds))
                                    <span class="badge bg-success enrolled-badge position-absolute top-0 end-0 m-2"><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-check-circle me-1' viewBox='0 0 16 16'><path d='M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z'/><path d='M10.97 5.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L5.324 10.384a.75.75 0 1 1 1.06-1.06l1.094 1.093 3.492-4.438z'/></svg>Enrolled</span>
                                @else
                                    <span class="badge bg-secondary enrolled-badge position-absolute top-0 end-0 m-2"><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-x-circle me-1' viewBox='0 0 16 16'><path d='M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z'/><path d='M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z'/></svg>Not Enrolled</span>
                                @endif
                            </div>
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title fw-bold">{{ $course->name }}</h5>
                                <p class="card-text flex-grow-1">{{ Str::limit($course->description, 100) }}</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="alert alert-info text-center">No courses found.</div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection


