    <!-- admin/manage.blade.php -->
    @foreach ($courses as $course)
        <div class="modal fade" id="manageCourseModal-{{ $course->id }}" tabindex="-1"
            aria-labelledby="manageCourseModalLabel-{{ $course->id }}" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title" id="manageCourseModalLabel-{{ $course->id }}">
                            <i class="fa fa-cogs me-2"></i>Manage Course: {{ $course->name }}
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Nav tabs -->
                        <div id="modal-alert" class="alert alert-success d-none" role="alert"></div>

                        <ul class="nav nav-tabs" id="courseManageTabs-{{ $course->id }}" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="objectives-tab-{{ $course->id }}"
                                    data-bs-toggle="tab" data-bs-target="#objectives-{{ $course->id }}" type="button"
                                    role="tab">
                                    <i class="fa fa-bullseye me-1"></i>Objectives
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="projects-tab-{{ $course->id }}" data-bs-toggle="tab"
                                    data-bs-target="#projects-{{ $course->id }}" type="button" role="tab">
                                    <i class="fa fa-project-diagram me-1"></i>Projects
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="modules-tab-{{ $course->id }}" data-bs-toggle="tab"
                                    data-bs-target="#modules-{{ $course->id }}" type="button" role="tab">
                                    <i class="fa fa-layer-group me-1"></i>Modules
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="content-tab-{{ $course->id }}" data-bs-toggle="tab"
                                    data-bs-target="#content-{{ $course->id }}" type="button" role="tab">
                                    <i class="fa fa-file-alt me-1"></i>Content
                                </button>
                            </li>
                        </ul>

                        <!-- Tab content -->
                        <div class="tab-content mt-3" id="courseManageTabContent-{{ $course->id }}">

                            <!-- Objectives Tab -->
                            <div class="tab-pane fade show active" id="objectives-{{ $course->id }}" role="tabpanel">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h6 class="mb-0">Course Objectives</h6>
                                    <button type="button" class="btn btn-sm btn-success add-objective-btn"
                                        data-course-id="{{ $course->id }}">
                                        <i class="fa fa-plus me-1"></i>Add Objective
                                    </button>
                                </div>
                                <div id="objectives-container-{{ $course->id }}">
                                    <!-- Dynamic objectives will be added here -->
                                </div>
                                <div class="mt-3">
                                    <button type="button" class="btn btn-primary save-objectives-btn"
                                        data-course-id="{{ $course->id }}">
                                        <i class="fa fa-save me-1"></i>Save Objectives
                                    </button>
                                </div>
                            </div>

                            <!-- Projects Tab -->
                            <div class="tab-pane fade" id="projects-{{ $course->id }}" role="tabpanel">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h6 class="mb-0">Course Projects</h6>
                                    <button type="button" class="btn btn-sm btn-success add-project-btn"
                                        data-course-id="{{ $course->id }}">
                                        <i class="fa fa-plus me-1"></i>Add Project
                                    </button>
                                </div>
                                <div id="projects-container-{{ $course->id }}">
                                    <!-- Dynamic projects will be added here -->
                                </div>
                                <div class="mt-3">
                                    <button type="button" class="btn btn-primary save-projects-btn"
                                        data-course-id="{{ $course->id }}">
                                        <i class="fa fa-save me-1"></i>Save Projects
                                    </button>
                                </div>
                            </div>

                            <!-- Modules Tab -->
                            <div class="tab-pane fade" id="modules-{{ $course->id }}" role="tabpanel">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h6 class="mb-0">Course Modules</h6>
                                    <button type="button" class="btn btn-sm btn-success add-module-btn"
                                        data-course-id="{{ $course->id }}">
                                        <i class="fa fa-plus me-1"></i>Add Module
                                    </button>
                                </div>
                                <div id="modules-container-{{ $course->id }}">
                                    <!-- Dynamic modules will be added here -->
                                </div>
                                <div class="mt-3">
                                    <button type="button" class="btn btn-primary save-modules-btn"
                                        data-course-id="{{ $course->id }}">
                                        <i class="fa fa-save me-1"></i>Save Modules
                                    </button>
                                </div>
                            </div>

                            <!-- Content Tab -->
                            <div class="tab-pane fade" id="content-{{ $course->id }}" role="tabpanel">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h6 class="mb-0">Course Content</h6>
                                    <button type="button" class="btn btn-sm btn-success add-content-btn"
                                        data-course-id="{{ $course->id }}">
                                        <i class="fa fa-plus me-1"></i>Add Content
                                    </button>
                                </div>
                                <div id="content-container-{{ $course->id }}">
                                    <!-- Dynamic content will be added here -->
                                </div>
                                <div class="mt-3">
                                    <button type="button" class="btn btn-primary save-content-btn"
                                        data-course-id="{{ $course->id }}">
                                        <i class="fa fa-save me-1"></i>Save Content
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @push('scripts')
        <script>
            
            document.addEventListener('DOMContentLoaded', function() {
                // ----------- Objectives (you already have this) -----------
                // Remove Objective - delegation
                document.querySelectorAll('[id^="objectives-container-"]').forEach(container => {
                    container.addEventListener('click', e => {
                        if (e.target.closest('.remove-objective-btn')) {
                            e.target.closest('.objective-item').remove();
                        }
                    });
                });

                // Add Objective
                document.querySelectorAll('.add-objective-btn').forEach(btn => {
                    btn.addEventListener('click', function() {
                        const courseId = this.dataset.courseId;
                        const container = document.getElementById(`objectives-container-${courseId}`);
                        if (!container) return;
                        const count = container.querySelectorAll('.objective-item').length + 1;
                        const html = `<div class="card mb-3 objective-item" data-objective-id="${count}">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <h6 class="card-title mb-0">Objective ${count}</h6>
                        <button type="button" class="btn btn-sm btn-danger remove-objective-btn"><i class="fa fa-trash"></i></button>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" class="form-control objective-title" placeholder="Enter objective title">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control objective-description" rows="3" placeholder="Enter objective description"></textarea>
                    </div>
                </div>
            </div>`;
                        container.insertAdjacentHTML('beforeend', html);
                    });
                });
                
                // Save Objectives
                document.querySelectorAll('.save-objectives-btn').forEach(btn => {
                    btn.addEventListener('click', function() {
                        const courseId = this.dataset.courseId;
                        const container = document.getElementById(`objectives-container-${courseId}`);
                        if (!container) return;

                        const objectives = [];
                        container.querySelectorAll('.objective-item').forEach(item => {
                            const title = item.querySelector('.objective-title').value.trim();
                            const description = item.querySelector('.objective-description')
                                .value.trim();
                            objectives.push({
                                title,
                                description
                            }); // save all, even if empty
                        });

                        fetch(`/admin/courses/${courseId}/objectives`, {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector(
                                        'meta[name="csrf-token"]').content
                                },
                                body: JSON.stringify({
                                    data: objectives
                                })
                            }).then(res => res.json())
                            .then(data => console.log('Objectives saved:', data))
                            .catch(err => console.error('Save error:', err));
                    });
                });

                // ----------- Projects (similar to objectives) -----------
                document.querySelectorAll('[id^="projects-container-"]').forEach(container => {
                    container.addEventListener('click', e => {
                        if (e.target.closest('.remove-project-btn')) {
                            e.target.closest('.project-item').remove();
                        }
                    });
                });

                document.querySelectorAll('.add-project-btn').forEach(btn => {
                    btn.addEventListener('click', function() {
                        const courseId = this.dataset.courseId;
                        const container = document.getElementById(`projects-container-${courseId}`);
                        if (!container) return;
                        const count = container.querySelectorAll('.project-item').length + 1;
                        const html = `<div class="card mb-3 project-item" data-project-id="${count}">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <h6 class="card-title mb-0">Project ${count}</h6>
                        <button type="button" class="btn btn-sm btn-danger remove-project-btn"><i class="fa fa-trash"></i></button>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" class="form-control project-title" placeholder="Enter project title">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control project-description" rows="3" placeholder="Enter project description"></textarea>
                    </div>
                </div>
            </div>`;
                        container.insertAdjacentHTML('beforeend', html);
                    });
                });

                document.querySelectorAll('.save-projects-btn').forEach(btn => {
                    btn.addEventListener('click', function() {
                        const courseId = this.dataset.courseId;
                        const container = document.getElementById(`projects-container-${courseId}`);
                        if (!container) return;

                        const projects = [];
                        container.querySelectorAll('.project-item').forEach(item => {
                            const title = item.querySelector('.project-title').value.trim();
                            const description = item.querySelector('.project-description').value
                                .trim();
                            projects.push({
                                title,
                                description
                            });
                        });

                        fetch(`/admin/courses/${courseId}/projects`, {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector(
                                        'meta[name="csrf-token"]').content
                                },
                                body: JSON.stringify({
                                    data: projects
                                })
                            }).then(res => res.json())
                            .then(data => console.log('Projects saved:', data))
                            .catch(err => console.error('Save error:', err));
                    });
                });

                // ----------- Modules -----------
                document.querySelectorAll('[id^="modules-container-"]').forEach(container => {
                    container.addEventListener('click', e => {
                        if (e.target.closest('.remove-module-btn')) {
                            e.target.closest('.module-item').remove();
                        }
                    });
                });

                document.querySelectorAll('.add-module-btn').forEach(btn => {
                    btn.addEventListener('click', function() {
                        const courseId = this.dataset.courseId;
                        const container = document.getElementById(`modules-container-${courseId}`);
                        if (!container) return;
                        const count = container.querySelectorAll('.module-item').length + 1;
                        const html = `<div class="card mb-3 module-item" data-module-id="${count}">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <h6 class="card-title mb-0">Module ${count}</h6>
                        <button type="button" class="btn btn-sm btn-danger remove-module-btn"><i class="fa fa-trash"></i></button>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label class="form-label">Module Number</label>
                            <input type="number" class="form-control module-number" placeholder="Module #" value="${count}">
                        </div>
                        <div class="col-md-9">
                            <label class="form-label">Title</label>
                            <input type="text" class="form-control module-title" placeholder="Enter module title">
                        </div>
                    </div>
                    <div class="mt-3">
                        <label class="form-label">Content Topics</label>
                        <textarea class="form-control module-content" rows="3" placeholder="Enter module content topics"></textarea>
                    </div>
                </div>
            </div>`;
                        container.insertAdjacentHTML('beforeend', html);
                    });
                });

                document.querySelectorAll('.save-modules-btn').forEach(btn => {
                    btn.addEventListener('click', function() {
                        const courseId = this.dataset.courseId;
                        const container = document.getElementById(`modules-container-${courseId}`);
                        if (!container) return;

                        const modules = [];
                        container.querySelectorAll('.module-item').forEach(item => {
                            const module_number = item.querySelector('.module-number').value
                                .trim();
                            const title = item.querySelector('.module-title').value.trim();
                            const content_topics = item.querySelector('.module-content').value
                                .trim();
                            modules.push({
                                module_number,
                                title,
                                content_topics
                            });
                        });

                        fetch(`/admin/courses/${courseId}/modules`, {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector(
                                        'meta[name="csrf-token"]').content
                                },
                                body: JSON.stringify({
                                    data: modules
                                })
                            }).then(res => res.json())
                            .then(data => console.log('Modules saved:', data))
                            .catch(err => console.error('Save error:', err));
                    });
                });

                // ----------- Content Topics -----------
                document.querySelectorAll('[id^="content-container-"]').forEach(container => {
                    container.addEventListener('click', e => {
                        if (e.target.closest('.remove-content-btn')) {
                            e.target.closest('.content-item').remove();
                        }
                    });
                });

                document.querySelectorAll('.add-content-btn').forEach(btn => {
                    btn.addEventListener('click', function() {
                        const courseId = this.dataset.courseId;
                        const container = document.getElementById(`content-container-${courseId}`);
                        if (!container) return;
                        const count = container.querySelectorAll('.content-item').length + 1;
                        const html = `<div class="card mb-3 content-item" data-content-id="${count}">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <h6 class="card-title mb-0">Content ${count}</h6>
                        <button type="button" class="btn btn-sm btn-danger remove-content-btn"><i class="fa fa-trash"></i></button>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" class="form-control content-title" placeholder="Enter content title">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Course Content ID</label>
                        <select class="form-select content-course-id">
                            <option value="">Select Module</option>
                            <!-- You may want to populate this dynamically with modules -->
                        </select>
                    </div>
                </div>
            </div>`;
                        container.insertAdjacentHTML('beforeend', html);
                    });
                });

                document.querySelectorAll('.save-content-btn').forEach(btn => {
                    btn.addEventListener('click', function() {
                        const courseId = this.dataset.courseId;
                        const container = document.getElementById(`content-container-${courseId}`);
                        if (!container) return;

                        const contents = [];
                        container.querySelectorAll('.content-item').forEach(item => {
                            const title = item.querySelector('.content-title').value.trim();
                            const course_content_id = item.querySelector('.content-course-id')
                                .value.trim();
                            contents.push({
                                title,
                                course_content_id
                            });
                        });

                        fetch(`/admin/courses/${courseId}/content`, {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector(
                                        'meta[name="csrf-token"]').content
                                },
                                body: JSON.stringify({
                                    data: contents
                                })
                            }).then(res => res.json())
                            .then(data => console.log('Content saved:', data))
                            .catch(err => console.error('Save error:', err));
                    });
                });
            });
        </script>
    @endpush
