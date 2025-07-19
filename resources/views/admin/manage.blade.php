@extends('admin.app')

@section('title', 'Manage ' . $course->name)
@section('page_title', 'Manage ' . $course->name)

@section('content')
    <div class="container-fluid py-4">
        <!-- Course Header -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card bg-primary text-white shadow rounded-4 border-0">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="me-4">
                                <div class="bg-white text-primary rounded-circle d-flex align-items-center justify-content-center shadow" style="width: 80px; height: 80px; font-size: 2rem; font-weight: bold;">
                                    {{ strtoupper(substr($course->name, 0, 1)) }}
                                </div>
                            </div>
                            <div>
                                <h2 class="mb-2 fw-bold">{{ $course->name }}</h2>
                                <p class="mb-0 opacity-75 fs-5">
                                    {{ $course->description ?? 'Comprehensive course management dashboard' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Management Sections -->
        <div class="row">
            <!-- Course Contents Section -->
            <div class="col-lg-4 mb-4">
                <div class="card h-100 shadow rounded-4 border-0">
                    <div class="card-header bg-info text-white rounded-top-4 border-0">
                        <h5 class="mb-0 fw-bold d-flex align-items-center">
                            <i class="fas fa-book me-2"></i>Course Content
                        </h5>
                    </div>
                    <div class="card-body bg-light bg-gradient rounded-bottom-4">
                        <p class="text-muted mb-4">Manage course modules and learning materials</p>
                        <!-- Add Content Form -->
                        <form method="POST" action="{{ route('admin.contents.store', $course) }}" class="mb-4">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Module Number</label>
                                <input type="number" name="module_number" class="form-control rounded-pill" min="1" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Module Title</label>
                                <input type="text" name="title" class="form-control rounded-pill" required placeholder="Enter module title">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Description</label>
                                <textarea name="description" class="form-control rounded-3" rows="3" placeholder="Brief description of the module"></textarea>
                            </div>
                            <button type="submit" class="btn btn-info text-white w-100 rounded-pill shadow-sm">
                                <i class="fas fa-plus me-2"></i>Add Module
                            </button>
                        </form>
                        <!-- Existing Content List -->
                        <div class="existing-content">
                            <h6 class="fw-semibold mb-3">Current Modules ({{ $course->contents->count() }})</h6>
                            @foreach ($course->contents as $content)
                                <div class="card mb-2 border-left-info shadow-sm rounded-3 card-hover module-item" data-id="{{ $content->id }}">
                                    <div class="card-body p-3">
                                        <div class="d-flex justify-content-between align-items-start">
                                            <div>
                                                <span class="badge bg-info mb-1">Module {{ $content->module_number }}</span>
                                                <h6 class="mb-1 fw-bold">{{ $content->title }}</h6>
                                                <small class="text-muted">{{ $content->description }}</small>
                                            </div>
                                            <div class="d-flex align-items-center gap-1">
                                                <div class="dropdown me-1">
                                                    <button class="btn btn-sm btn-outline-secondary rounded-circle" data-bs-toggle="dropdown">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item" href="#"><i class="fas fa-edit me-2"></i>Edit</a></li>
                                                    </ul>
                                                </div>
                                                <button class="btn btn-sm btn-danger rounded-circle delete-module-btn" data-id="{{ $content->id }}" data-url="{{ route('admin.contents.destroy', [$course, $content]) }}"><i class="fas fa-trash"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!-- Course Objectives Section -->
            <div class="col-lg-4 mb-4">
                <div class="card h-100 shadow rounded-4 border-0">
                    <div class="card-header bg-success text-white rounded-top-4 border-0">
                        <h5 class="mb-0 fw-bold d-flex align-items-center">
                            <i class="fas fa-target me-2"></i>Learning Objectives
                        </h5>
                    </div>
                    <div class="card-body bg-light bg-gradient rounded-bottom-4">
                        <p class="text-muted mb-4">Define learning goals and outcomes</p>
                        <!-- Add Objective Form -->
                        <form method="POST" action="{{ route('admin.objectives.store', $course) }}" class="mb-4">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Objective Title</label>
                                <input type="text" name="title" class="form-control rounded-pill" required placeholder="Enter objective title">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Description</label>
                                <textarea name="description" class="form-control rounded-3" rows="3" placeholder="Describe the learning objective"></textarea>
                            </div>
                            <button type="submit" class="btn btn-success w-100 rounded-pill shadow-sm">
                                <i class="fas fa-plus me-2"></i>Add Objective
                            </button>
                        </form>
                        <!-- Existing Objectives List -->
                        <div class="existing-objectives">
                            <h6 class="fw-semibold mb-3">Current Objectives ({{ $course->objectives->count() }})</h6>
                            @foreach ($course->objectives as $index => $objective)
                                <div class="card mb-2 border-left-success shadow-sm rounded-3 card-hover objective-item" data-id="{{ $objective->id }}">
                                    <div class="card-body p-3">
                                        <div class="d-flex justify-content-between align-items-start">
                                            <div>
                                                <div class="d-flex align-items-center mb-2">
                                                    <span class="badge bg-success me-2">{{ $index + 1 }}</span>
                                                    <h6 class="mb-0 fw-bold">{{ $objective->title }}</h6>
                                                </div>
                                                <small class="text-muted">{{ $objective->description }}</small>
                                            </div>
                                            <div class="d-flex align-items-center gap-1">
                                                <div class="dropdown me-1">
                                                    <button class="btn btn-sm btn-outline-secondary rounded-circle" data-bs-toggle="dropdown">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item" href="#"><i class="fas fa-edit me-2"></i>Edit</a></li>
                                                    </ul>
                                                </div>
                                                <button class="btn btn-sm btn-danger rounded-circle delete-objective-btn" data-id="{{ $objective->id }}" data-url="{{ route('admin.objectives.destroy', [$course, $objective]) }}"><i class="fas fa-trash"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!-- Course Projects Section -->
            <div class="col-lg-4 mb-4">
                <div class="card h-100 shadow rounded-4 border-0">
                    <div class="card-header bg-warning text-dark rounded-top-4 border-0">
                        <h5 class="mb-0 fw-bold d-flex align-items-center">
                            <i class="fas fa-project-diagram me-2"></i>Course Projects
                        </h5>
                    </div>
                    <div class="card-body bg-light bg-gradient rounded-bottom-4">
                        <p class="text-muted mb-4">Create hands-on projects and assignments</p>
                        <!-- Add Project Form -->
                        <form method="POST" action="{{ route('admin.projects.store', $course) }}" class="mb-4">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Project Title</label>
                                <input type="text" name="title" class="form-control rounded-pill" required placeholder="Enter project title">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Description</label>
                                <textarea name="description" class="form-control rounded-3" rows="3" placeholder="Describe the project requirements"></textarea>
                            </div>
                            <button type="submit" class="btn btn-warning text-dark w-100 rounded-pill shadow-sm">
                                <i class="fas fa-plus me-2"></i>Add Project
                            </button>
                        </form>
                        <!-- Existing Projects List -->
                        <div class="existing-projects">
                            <h6 class="fw-semibold mb-3">Current Projects ({{ $course->projects->count() }})</h6>
                            @foreach ($course->projects as $project)
                                <div class="card mb-2 border-left-warning shadow-sm rounded-3 card-hover project-item" data-id="{{ $project->id }}">
                                    <div class="card-body p-3">
                                        <div class="d-flex justify-content-between align-items-start">
                                            <div>
                                                <h6 class="mb-1 fw-bold"><i class="fas fa-code me-2 text-warning"></i>{{ $project->title }}</h6>
                                                <small class="text-muted">{{ $project->description }}</small>
                                            </div>
                                            <div class="d-flex align-items-center gap-1">
                                                <div class="dropdown me-1">
                                                    <button class="btn btn-sm btn-outline-secondary rounded-circle" data-bs-toggle="dropdown">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item" href="#"><i class="fas fa-edit me-2"></i>Edit</a></li>
                                                        <li><a class="dropdown-item" href="#"><i class="fas fa-eye me-2"></i>View Details</a></li>
                                                    </ul>
                                                </div>
                                                <button class="btn btn-sm btn-danger rounded-circle delete-project-btn" data-id="{{ $project->id }}" data-url="{{ route('admin.projects.destroy', [$course, $project]) }}"><i class="fas fa-trash"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Stats Row -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="card shadow rounded-4 border-0">
                    <div class="card-header bg-white border-0 rounded-top-4">
                        <h5 class="mb-0 fw-bold"><i class="fas fa-chart-bar me-2 text-primary"></i>Course Statistics</h5>
                    </div>
                    <div class="card-body bg-light bg-gradient rounded-bottom-4">
                        <div class="row text-center g-3">
                            <div class="col-md-3">
                                <div class="p-3 bg-white rounded-3 shadow-sm h-100">
                                    <i class="fas fa-book fa-2x text-info mb-2"></i>
                                    <h4 class="text-info mb-0">{{ $course->contents->count() }}</h4>
                                    <small class="text-muted">Modules</small>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="p-3 bg-white rounded-3 shadow-sm h-100">
                                    <i class="fas fa-target fa-2x text-success mb-2"></i>
                                    <h4 class="text-success mb-0">{{ $course->objectives->count() }}</h4>
                                    <small class="text-muted">Objectives</small>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="p-3 bg-white rounded-3 shadow-sm h-100">
                                    <i class="fas fa-project-diagram fa-2x text-warning mb-2"></i>
                                    <h4 class="text-warning mb-0">{{ $course->projects->count() }}</h4>
                                    <small class="text-muted">Projects</small>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="p-3 bg-white rounded-3 shadow-sm h-100">
                                    <i class="fas fa-percentage fa-2x text-primary mb-2"></i>
                                    @php
                                        $total = $course->contents->count() + $course->objectives->count() + $course->projects->count();
                                        $completion = $total > 0 ? round(($total / 15) * 100) : 0;
                                    @endphp
                                    <div class="d-flex flex-column align-items-center">
                                        <div class="w-100 mb-2">
                                            <div class="progress" style="height: 12px;">
                                                <div class="progress-bar bg-primary" role="progressbar" style="width: {{ min($completion, 100) }}%;" aria-valuenow="{{ min($completion, 100) }}" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <span class="fw-bold text-primary">{{ min($completion, 100) }}%</span>
                                    </div>
                                    <small class="text-muted">Completion</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .border-left-info {
            border-left: 4px solid #17a2b8 !important;
        }
        .border-left-success {
            border-left: 4px solid #28a745 !important;
        }
        .border-left-warning {
            border-left: 4px solid #ffc107 !important;
        }
        .card-hover:hover {
            box-shadow: 0 6px 16px rgba(0,0,0,0.13) !important;
            transition: box-shadow 0.3s;
        }
        .card-header {
            border-bottom: 2px solid rgba(0, 0, 0, 0.07);
        }
        .btn:hover {
            transform: translateY(-1px);
            transition: transform 0.2s;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
            // === Handle Module Submission ===
            const contentForm = document.querySelector('form[action*="contents"]');
            contentForm.addEventListener('submit', async function(e) {
                e.preventDefault();
                const formData = new FormData(contentForm);
                const url = contentForm.action;
                try {
                    const response = await fetch(url, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken
                        },
                        body: formData
                    });
                    const data = await response.json();
                    if (data.success) {
                        const container = document.querySelector('.existing-content');
                        const newCard = document.createElement('div');
                        newCard.className = 'card mb-2 border-left-info shadow-sm rounded-3 card-hover module-item';
                        newCard.setAttribute('data-id', data.content.id);
                        newCard.innerHTML = `
                        <div class="card-body p-3">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <span class="badge bg-info mb-1">Module ${data.content.module_number}</span>
                                    <h6 class="mb-1 fw-bold">${data.content.title}</h6>
                                    <small class="text-muted">${data.content.description || ''}</small>
                                </div>
                                <div class="d-flex align-items-center gap-1">
                                    <div class="dropdown me-1">
                                        <button class="btn btn-sm btn-outline-secondary rounded-circle" data-bs-toggle="dropdown">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="fas fa-edit me-2"></i>Edit</a></li>
                                        </ul>
                                    </div>
                                    <button class="btn btn-sm btn-danger rounded-circle delete-module-btn" data-id="${data.content.id}" data-url="${url.replace('store', 'destroy')}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>`;
                        container.prepend(newCard);
                        contentForm.reset();
                    } else {
                        alert('Something went wrong while adding the module.');
                    }
                } catch (error) {
                    console.error(error);
                    alert('Error submitting form.');
                }
            });
            // === Handle Objective Submission ===
            const objectiveForm = document.querySelector('form[action*="objectives"]');
            objectiveForm.addEventListener('submit', async function(e) {
                e.preventDefault();
                const formData = new FormData(objectiveForm);
                const url = objectiveForm.action;
                try {
                    const response = await fetch(url, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken
                        },
                        body: formData
                    });
                    const data = await response.json();
                    if (data.success) {
                        const container = document.querySelector('.existing-objectives');
                        const count = container.querySelectorAll('.card').length + 1;
                        const newCard = document.createElement('div');
                        newCard.className = 'card mb-2 border-left-success shadow-sm rounded-3 card-hover objective-item';
                        newCard.setAttribute('data-id', data.objective.id);
                        newCard.innerHTML = `
                        <div class="card-body p-3">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="badge bg-success me-2">${count}</span>
                                        <h6 class="mb-0 fw-bold">${data.objective.title}</h6>
                                    </div>
                                    <small class="text-muted">${data.objective.description || ''}</small>
                                </div>
                                <div class="d-flex align-items-center gap-1">
                                    <div class="dropdown me-1">
                                        <button class="btn btn-sm btn-outline-secondary rounded-circle" data-bs-toggle="dropdown">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="fas fa-edit me-2"></i>Edit</a></li>
                                        </ul>
                                    </div>
                                    <button class="btn btn-sm btn-danger rounded-circle delete-objective-btn" data-id="${data.objective.id}" data-url="${url.replace('store', 'destroy')}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>`;
                        container.prepend(newCard);
                        objectiveForm.reset();
                    } else {
                        alert('Failed to add objective.');
                    }
                } catch (error) {
                    console.error(error);
                    alert('Error submitting form.');
                }
            });
            // === Handle Project Submission ===
            const projectForm = document.querySelector('form[action*="projects"]');
            projectForm.addEventListener('submit', async function(e) {
                e.preventDefault();
                const formData = new FormData(projectForm);
                const url = projectForm.action;
                try {
                    const response = await fetch(url, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken
                        },
                        body: formData
                    });
                    const data = await response.json();
                    if (data.success) {
                        const container = document.querySelector('.existing-projects');
                        const newCard = document.createElement('div');
                        newCard.className = 'card mb-2 border-left-warning shadow-sm rounded-3 card-hover project-item';
                        newCard.setAttribute('data-id', data.project.id);
                        newCard.innerHTML = `
                        <div class="card-body p-3">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <h6 class="mb-1 fw-bold"><i class="fas fa-code me-2 text-warning"></i>${data.project.title}</h6>
                                    <small class="text-muted">${data.project.description || ''}</small>
                                </div>
                                <div class="d-flex align-items-center gap-1">
                                    <div class="dropdown me-1">
                                        <button class="btn btn-sm btn-outline-secondary rounded-circle" data-bs-toggle="dropdown">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i class="fas fa-edit me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="fas fa-eye me-2"></i>View Details</a></li>
                                        </ul>
                                    </div>
                                    <button class="btn btn-sm btn-danger rounded-circle delete-project-btn" data-id="${data.project.id}" data-url="${url.replace('store', 'destroy')}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>`;
                        container.prepend(newCard);
                        projectForm.reset();
                    } else {
                        alert('Failed to add project.');
                    }
                } catch (error) {
                    console.error(error);
                    alert('Error submitting form.');
                }
            });
        });

        // Add instant delete handlers for modules, objectives, and projects
        function handleInstantDelete(className, itemClass) {
            document.addEventListener('click', function(e) {
                if (e.target.closest(className)) {
                    const btn = e.target.closest(className);
                    const url = btn.getAttribute('data-url');
                    const id = btn.getAttribute('data-id');
                    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
                    fetch(url, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken,
                            'Accept': 'application/json'
                        }
                    }).then(res => {
                        if (res.ok) {
                            const item = btn.closest(itemClass);
                            if (item) item.remove();
                        }
                    });
                }
            });
        }
        handleInstantDelete('.delete-module-btn', '.module-item');
        handleInstantDelete('.delete-objective-btn', '.objective-item');
        handleInstantDelete('.delete-project-btn', '.project-item');
    </script>
@endsection

