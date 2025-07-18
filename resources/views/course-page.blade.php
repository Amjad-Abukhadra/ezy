@extends('layouts.app')

@section('title', $course->name)

@push('styles')
    <style>
        .hero-gradient {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
        }

        .angular-logo {
            background: #dd0031;
        }

        .border-orange {
            border-left: 4px solid #ff6b35 !important;
        }

        .text-orange {
            color: #ff6b35 !important;
        }

        .bg-orange {
            background: linear-gradient(135deg, #ff6b35 0%, #ff8c42 100%) !important;
        }
    </style>
@endpush

@section('content')
    <!-- Hero Section -->
    <div class="hero-gradient text-white py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="angular-logo rounded-3 d-flex align-items-center justify-content-center mx-auto mx-lg-0 mb-4"
                        style="width: 80px; height: 80px;">
                        <span class="fs-2 fw-bold">{{ strtoupper(substr($course->name, 0, 1)) }}</span>
                    </div>
                    <h1 class="display-4 fw-bold mb-3">{{ $course->name }}</h1>
                    <h2 class="h3 mb-4">{{ $course->subtitle ?? '' }}</h2>
                    <div class="badge bg-light bg-opacity-20 text-white px-3 py-2 mb-4">
                        <i class="bi bi-calendar3"></i>
                        {{ $course->status == 1 ? 'Currently Available' : ($course->status == 2 ? 'Coming Soon' : 'Archived') }}
                    </div>
                </div>
                <div class="col-lg-6">
                    @if ($course->photo)
                        <img src="{{ asset('storage/' . $course->photo) }}" class="img-fluid rounded-3 shadow-lg"
                            alt="Course Image">
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row">
            <!-- About the Course -->
            <div class="col-lg-6 mb-5">
                <h3 class="fw-bold text-primary mb-4">About The Course</h3>
                <p class="text-muted mb-4">
                    {{ $course->description ?? 'No description available.' }}
                </p>

                <h5 class="fw-bold text-primary mb-3">Objectives</h5>
                <div class="list-group list-group-flush">
                    @forelse ($course->objectives as $objective)
                        <div class="list-group-item border-orange bg-light px-4 py-3 mb-3 rounded">
                            <h6 class="fw-semibold text-primary mb-2">{{ $objective->title }}</h6>
                            <p class="text-muted small mb-0">{{ $objective->description }}</p>
                        </div>
                    @empty
                        <p class="text-muted small">No objectives found.</p>
                    @endforelse
                </div>
            </div>

            <!-- Course Content -->
            <div class="col-lg-6 mb-5">
                <h3 class="fw-bold text-primary mb-4">Course Content</h3>

                <div class="accordion" id="courseAccordion">
                    @forelse ($course->contents as $index => $content)
                        <div class="accordion-item border rounded-3 mb-3">
                            <h2 class="accordion-header" id="heading{{ $index }}">
                                <button class="accordion-button collapsed fw-semibold" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#module{{ $index }}"
                                    aria-expanded="false" aria-controls="module{{ $index }}">
                                    <i class="bi bi-play-circle text-orange me-2"></i>
                                    {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }} {{ $content->title }}
                                </button>
                            </h2>
                            <div id="module{{ $index }}" class="accordion-collapse collapse"
                                aria-labelledby="heading{{ $index }}" data-bs-parent="#courseAccordion">
                                <div class="accordion-body">
                                    <ul class="list-unstyled">
                                        @php
                                            // Assuming content->items is stored as JSON array of strings
                                            $items = json_decode($content->items, true) ?? [];
                                        @endphp

                                        @forelse ($items as $item)
                                            <li class="py-1"><i
                                                    class="bi bi-check-circle text-orange me-2"></i>{{ $item }}
                                            </li>
                                        @empty
                                            <li class="text-muted small">No content items available.</li>
                                        @endforelse
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-muted small">No course content available.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <!-- Projects Section -->
    <div class="bg-light py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold text-primary mb-3">{{ $course->name }} Projects</h2>
                <p class="text-muted">Build real-world applications with these hands-on projects</p>
            </div>

            <div class="row g-4">
                @forelse ($course->projects as $project)
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-body text-center p-4">
                                <div class="bg-orange rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3"
                                    style="width: 60px; height: 60px;">
                                    {{-- You can use a project icon or fallback icon --}}
                                    <i class="bi bi-folder text-white fs-4"></i>
                                </div>
                                <h5 class="fw-bold text-primary mb-2">{{ $project->title }}</h5>
                                <p class="text-muted small">{{ $project->description }}</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-muted small text-center">No projects available.</p>
                @endforelse
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="hero-gradient text-white py-5">
        <div class="container text-center">
            <h3 class="fw-bold mb-3">Wanna check more about the course?</h3>
            <div class="d-flex justify-content-center gap-3 flex-wrap">
                <button class="btn btn-outline-light btn-lg px-4">
                    <i class="bi bi-play-circle me-2"></i>Demo
                </button>
                <button class="btn btn-warning btn-lg px-4">
                    <i class="bi bi-download me-2"></i>Download Material
                </button>
            </div>
        </div>
    </div>

    <!-- Tools & Platforms -->
    <div class="container py-5">
        <div class="text-center mb-5">
            <h3 class="fw-bold text-primary mb-3">Tools & Platforms</h3>
            <p class="text-muted">Technologies and tools you'll master in this course</p>
        </div>

        <div class="row justify-content-center g-4">
            <div class="col-6 col-md-4 col-lg-2">
                <div class="text-center p-3">
                    <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center mx-auto mb-2"
                        style="width: 60px; height: 60px;">
                        <i class="bi bi-code-slash text-white fs-4"></i>
                    </div>
                    <small class="text-muted">HTML/CSS</small>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <div class="text-center p-3">
                    <div class="bg-warning rounded-circle d-flex align-items-center justify-content-center mx-auto mb-2"
                        style="width: 60px; height: 60px;">
                        <i class="bi bi-filetype-js text-white fs-4"></i>
                    </div>
                    <small class="text-muted">JavaScript</small>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <div class="text-center p-3">
                    <div class="bg-danger rounded-circle d-flex align-items-center justify-content-center mx-auto mb-2"
                        style="width: 60px; height: 60px;">
                        <span class="text-white fw-bold">A</span>
                    </div>
                    <small class="text-muted">Angular</small>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <div class="text-center p-3">
                    <div class="bg-success rounded-circle d-flex align-items-center justify-content-center mx-auto mb-2"
                        style="width: 60px; height: 60px;">
                        <i class="bi bi-git text-white fs-4"></i>
                    </div>
                    <small class="text-muted">Git</small>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <div class="text-center p-3">
                    <div class="bg-info rounded-circle d-flex align-items-center justify-content-center mx-auto mb-2"
                        style="width: 60px; height: 60px;">
                        <i class="bi bi-bootstrap text-white fs-4"></i>
                    </div>
                    <small class="text-muted">Bootstrap</small>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <div class="text-center p-3">
                    <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center mx-auto mb-2"
                        style="width: 60px; height: 60px;">
                        <i class="bi bi-terminal text-white fs-4"></i>
                    </div>
                    <small class="text-muted">CLI Tools</small>
                </div>
            </div>
        </div>
    </div>
@endsection
