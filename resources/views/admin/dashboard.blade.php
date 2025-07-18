@extends('admin.app')

@section('title', 'Admin Dashboard')
@section('page_title', 'Admin Dashboard')

@section('content')
    <section class="py-5">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>
                    <span style="color: #0148A9;">Courses</span>
                    <span style="color: #fd7e14;">List</span>
                </h2>

                <!-- Create Course Button -->
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createCourseModal">
                    <i class="fa fa-plus me-1"></i> Create Course
                </button>
            </div>

            <div class="row g-4">
                @forelse ($courses as $course)
                    <div class="col-lg-3 col-md-4 col-sm-6" id="course-card-{{ $course->id }}">
                        <div class="card h-100 shadow-sm">
                            <div
                                style="height: 180px; background-image: url('{{ $course->photo ? asset('storage/' . $course->photo) : 'https://via.placeholder.com/400x180?text=No+Image' }}'); background-size: cover; background-position: center;">
                            </div>
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $course->name }}</h5>
                                <p class="card-text text-muted flex-grow-1">
                                    {{ Str::limit($course->description, 100, '...') ?: 'No description available' }}
                                </p>
                                <span
                                    class="badge 
                                    @if ($course->status == 1) bg-success
                                    @elseif($course->status == 2) bg-warning
                                    @else bg-secondary @endif rounded-pill px-3 py-2">
                                    @if ($course->status == 1)
                                        Open
                                    @elseif($course->status == 2)
                                        Coming Soon
                                    @else
                                        Archived
                                    @endif
                                </span>

                                <div class="d-flex gap-2 mt-2">
                                    <button class="btn btn-danger btn-sm delete-course-btn"
                                        data-course-id="{{ $course->id }}">
                                        <i class="fa fa-trash"></i> Delete
                                    </button>

                                    <button class="btn btn-secondary btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#manageCourseModal-{{ $course->id }}">
                                        <i class="fa fa-cogs"></i> Manage
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center text-muted py-5">
                        <i class="fas fa-search fa-3x mb-3"></i>
                        <h5>No courses found</h5>
                    </div>
                @endforelse
            </div>

        </div>

        @include('admin.create') <!-- your modal include -->
        @include('admin.manage') <!-- add this line -->
    </section>


@endsection
@push('scripts')
    <script>
        // Optionally, you can reset the modal form on close
        const createCourseModal = document.getElementById('createCourseModal');
        createCourseModal.addEventListener('hidden.bs.modal', () => {
            createCourseModal.querySelector('form').reset();
        });

        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('.delete-course-btn').forEach(button => {
                button.addEventListener('click', e => {
                    e.preventDefault();

                    const courseId = button.dataset.courseId;

                    fetch(`/admin/courses/${courseId}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Accept': 'application/json',
                                'Content-Type': 'application/json'
                            }
                        })
                        .then(response => {
                            if (!response.ok) throw new Error('Delete failed');
                            return response.json();
                        })
                        .then(data => {
                            if (data.success) {
                                const courseCard = document.getElementById(
                                    `course-card-${courseId}`);
                                if (courseCard) courseCard.remove();
                            }
                        })
                        .catch(err => {
                            console.error(err);
                        });
                });
            });
        });
    </script>
@endpush
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('.delete-course-btn').forEach(button => {
                button.addEventListener('click', e => {
                    e.preventDefault();

                    const courseId = button.dataset.courseId;

                    fetch(`/admin/courses/${courseId}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Accept': 'application/json',
                            },
                        })
                        .then(response => {
                            if (!response.ok) throw new Error('Failed to delete the course.');
                            return response.json();
                        })
                        .then(data => {
                            if (data.success) {
                                const courseCard = document.getElementById(
                                    `course-card-${courseId}`);
                                if (courseCard) courseCard.remove();
                            }
                        })
                        .catch(error => {
                            console.error('Delete error:', error);
                        });
                });
            });
        });
    </script>
@endpush
