@extends('layouts.app')

@section('title', 'Course Selector | Ezy')

@section('content')
    <section class="py-5">
        <div class="container">
            <!-- Header -->
            <div class="text-center mb-5">
                <h2 class="display-4 fw-bold mb-4">
                    <span style="color: #0148A9;">Courses</span>
                    <span style="color: #fd7e14;">List</span>
                </h2>
            </div>

            <!-- Search and Filter Section -->
            <div class="row mb-4">
                <div class="col-lg-6 mb-3">
                    <div class="position-relative">
                        <input type="text" id="course-search" class="form-control form-control-lg ps-5 rounded-pill"
                            placeholder="Search The Course Here">
                        <i class="fas fa-search position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>
                    </div>
                </div>
                <div class="col-lg-6 mb-3">
                    <div class="d-flex justify-content-end align-items-center">
                        <span class="me-3 text-muted">Sort by:</span>
                        <select class="form-select" id="sort-select" style="width: auto;">
                            <option value="popular">Popular Class</option>
                            <option value="newest">Newest First</option>
                            <option value="oldest">Oldest First</option>
                            <option value="name">Name A-Z</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Filter Tabs -->
            <div class="row mb-4">
                <div class="col-12">
                    <ul class="nav nav-pills justify-content-center" id="course-filter-tabs">
                        <li class="nav-item">
                            <a class="nav-link active px-4 py-3 mx-1 rounded-pill" href="#" data-filter="all">All</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-4 py-3 mx-1 rounded-pill" href="#" data-filter="1"
                                style="color: #fd7e14;">Opened</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-4 py-3 mx-1 rounded-pill" href="#" data-filter="2">Coming Soon</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-4 py-3 mx-1 rounded-pill" href="#" data-filter="3">Archived</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-4 py-3 mx-1 rounded-pill" href="{{ route('student.mycourses') }}">My
                                Courses</a>
                        </li>


                    </ul>
                </div>
            </div>
            <div id="responseMessage"></div>
            <!-- Courses Grid -->
            <div id="courses-container" class="row g-4">
                <div class="col-12 text-center">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading courses...</span>
                    </div>
                    <p class="mt-2 text-muted">Loading courses...</p>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/courses.js') }}"></script>
@endpush
