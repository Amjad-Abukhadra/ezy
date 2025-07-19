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
                    </ul>
                </div>
            </div>

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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let allCourses = [];
            let currentFilter = 'all';
            let currentSort = 'popular';

            // Load courses
            loadCourses();

            // Search functionality
            document.getElementById('course-search').addEventListener('input', function(e) {
                const searchTerm = e.target.value.toLowerCase();
                filterAndDisplayCourses(searchTerm);
            });

            // Filter tabs
            document.querySelectorAll('[data-filter]').forEach(tab => {
                tab.addEventListener('click', function(e) {
                    e.preventDefault();

                    // Update active tab
                    document.querySelectorAll('[data-filter]').forEach(t => t.classList.remove(
                        'active'));
                    this.classList.add('active');

                    currentFilter = this.dataset.filter;
                    filterAndDisplayCourses();
                });
            });

            // Sort functionality
            document.getElementById('sort-select').addEventListener('change', function(e) {
                currentSort = e.target.value;
                filterAndDisplayCourses();
            });

            function loadCourses() {
                fetch('/get-courses')
                    .then(response => {
                        if (!response.ok) throw new Error('Network error');
                        return response.json();
                    })
                    .then(data => {
                        if (data.success) {
                            allCourses = data.data;
                            filterAndDisplayCourses();
                        } else {
                            showError(data.message);
                        }
                    })
                    .catch(error => {
                        showError('Failed to load courses: ' + error.message);
                    });
            }

            function filterAndDisplayCourses(searchTerm = '') {
                let filtered = [...allCourses];

                // Apply status filter
                if (currentFilter !== 'all') {
                    filtered = filtered.filter(course => course.status == currentFilter);
                }

                // Apply search filter
                if (searchTerm) {
                    filtered = filtered.filter(course =>
                        course.name.toLowerCase().includes(searchTerm) ||
                        (course.description && course.description.toLowerCase().includes(searchTerm))
                    );
                }

                // Apply sorting
                filtered.sort((a, b) => {
                    switch (currentSort) {
                        case 'name':
                            return a.name.localeCompare(b.name);
                        case 'newest':
                            return new Date(b.created_at) - new Date(a.created_at);
                        case 'oldest':
                            return new Date(a.created_at) - new Date(b.created_at);
                        default:
                            return 0;
                    }
                });

                displayCourses(filtered);
            }

            function displayCourses(courses) {
                const container = document.getElementById('courses-container');

                if (courses.length === 0) {
                    container.innerHTML = `
                <div class="col-12 text-center py-5">
                    <i class="fas fa-search fa-4x text-muted mb-3"></i>
                    <h5 class="text-muted">No courses found</h5>
                    <p class="text-muted">Try adjusting your search or filter criteria</p>
                </div>
            `;
                    return;
                }

                container.innerHTML = courses.map(course => createCourseCard(course)).join('');
            }

            function createCourseCard(course) {
                const photoUrl = course.photo ? `/storage/${course.photo}` :
                    'https://via.placeholder.com/400x200?text=No+Image';

                const statusInfo = getStatusInfo(course.status);
                const logoColor = getLogoColor(course.name);
                const logoText = getLogoText(course.name);

                return `
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="card h-100 shadow-sm border-0 rounded-4 overflow-hidden">
                    <div
  class="position-relative"
 style="
  height: 300px;
  background-image: url('${photoUrl}');
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center center;
">
</div>

                    <div class="card-body p-4">
                        <h5 class="card-title fw-bold mb-2">${course.name}</h5>
                        <p class="card-text text-muted small mb-3">${course.description ? course.description.substring(0, 100) + '...' : 'No description available'}</p>
                        
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="badge ${statusInfo.class} rounded-pill px-3 py-2">${statusInfo.text}</span>
                        </div>
                        
                        <div class="row g-2">
                            <div class="col-6">
                                <button class="btn btn-outline-secondary btn-sm w-100 rounded-pill" onclick="location.href='/courses/${course.id}'">
                                    <i class="fas fa-eye me-1"></i> Live Demo
                                </button>
                            </div>
                            <div class="col-6">
                                <button 
  class="btn btn-warning btn-sm w-100 rounded-pill text-white" 
  onclick="enrollCourse(${course.id})">
  <i class="fas fa-user-plus me-1"></i> Enroll Now
</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `;
            }

            function enrollCourse(courseId) {
                fetch(`/courses/${courseId}/enroll`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}', // if you use blade rendering inside script tag
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                        },
                        body: JSON.stringify({})
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert('Enrollment successful!');
                            loadCourses(); // reload courses or update UI as needed
                        } else if (data.error) {
                            alert('Error: ' + data.error);
                        } else {
                            alert('Unexpected response.');
                        }
                    })
                    .catch(err => alert('Enrollment failed: ' + err.message));
            }

            function getStatusInfo(status) {
                switch (parseInt(status)) {
                    case 1:
                        return {
                            class: 'bg-success', text: 'Opened'
                        };
                    case 2:
                        return {
                            class: 'bg-warning', text: 'Coming Soon'
                        };
                    case 3:
                        return {
                            class: 'bg-secondary', text: 'Archived'
                        };
                    default:
                        return {
                            class: 'bg-secondary', text: 'Unknown'
                        };
                }
            }

            function getLogoColor(name) {
                const colors = [{
                        primary: '#dc3545',
                        secondary: '#fd7e14'
                    }, // Angular colors
                    {
                        primary: '#0d6efd',
                        secondary: '#20c997'
                    }, // AWS colors
                    {
                        primary: '#198754',
                        secondary: '#6f42c1'
                    }, // Vue colors
                    {
                        primary: '#ffc107',
                        secondary: '#dc3545'
                    }, // Power BI colors
                    {
                        primary: '#6610f2',
                        secondary: '#0dcaf0'
                    }, // Python colors
                    {
                        primary: '#0dcaf0',
                        secondary: '#6f42c1'
                    }, // Generic colors
                ];

                const index = name.length % colors.length;
                return colors[index];
            }

            function getLogoText(name) {
                const words = name.split(' ');
                if (words.length >= 2) {
                    return words[0].charAt(0) + words[1].charAt(0);
                }
                return name.substring(0, 2).toUpperCase();
            }

            function showError(message) {
                const container = document.getElementById('courses-container');
                container.innerHTML = `
            <div class="col-12 text-center py-5">
                <i class="fas fa-exclamation-triangle fa-4x text-danger mb-3"></i>
                <h5 class="text-danger">Error</h5>
                <p class="text-danger">${message}</p>
            </div>
        `;
            }
        });
    </script>
@endsection
