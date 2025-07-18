<!-- Create Course Modal -->
<div class="modal fade" id="createCourseModal" tabindex="-1" aria-labelledby="createCourseModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="createCourseModalLabel">
                    <i class="fa fa-graduation-cap me-2"></i> Create New Course
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Include your form here -->
                <form action="{{ route('admin.courses.store') }}" method="POST" enctype="multipart/form-data"
                    id="createCourseForm">
                    @csrf

                    <!-- Course Title -->
                    <div class="mb-4">
                        <label class="form-label fw-semibold fs-6 mb-2">
                            <i class="fa fa-book me-2 text-primary"></i>Course Title
                        </label>
                        <input type="text" name="name" class="form-control form-control-lg"
                            placeholder="Enter an engaging course title..." value="{{ old('name') }}" required>
                    </div>

                    <!-- Course Description -->
                    <div class="mb-4">
                        <label class="form-label fw-semibold fs-6 mb-2">
                            <i class="fa fa-align-left me-2 text-primary"></i>Course Description
                        </label>
                        <textarea name="description" class="form-control" rows="4"
                            placeholder="Describe what students will learn in this course...">{{ old('description') }}</textarea>
                    </div>

                    <!-- Course Status -->
                    <div class="mb-4">
                        <label class="form-label fw-semibold fs-6 mb-3">
                            <i class="fa fa-toggle-on me-2 text-primary"></i>Course Status
                        </label>
                        <div class="row g-3">
                            <div class="col-md-4">
                                <input type="radio" class="btn-check" name="status" id="status1" value="1"
                                    {{ old('status', '1') == '1' ? 'checked' : '' }}>
                                <label class="btn btn-outline-success w-100 py-3" for="status1">
                                    <i class="fa fa-unlock-alt d-block mb-1"></i> Open
                                </label>
                            </div>
                            <div class="col-md-4">
                                <input type="radio" class="btn-check" name="status" id="status2" value="2"
                                    {{ old('status') == '2' ? 'checked' : '' }}>
                                <label class="btn btn-outline-warning w-100 py-3" for="status2">
                                    <i class="fa fa-clock d-block mb-1"></i> Coming Soon
                                </label>
                            </div>
                            <div class="col-md-4">
                                <input type="radio" class="btn-check" name="status" id="status3" value="3"
                                    {{ old('status') == '3' ? 'checked' : '' }}>
                                <label class="btn btn-outline-secondary w-100 py-3" for="status3">
                                    <i class="fa fa-archive d-block mb-1"></i> Archived
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Course Photo -->
                    <div class="mb-4">
                        <label class="form-label fw-semibold fs-6 mb-3">
                            <i class="fa fa-image me-2 text-primary"></i>Course Image
                        </label>
                        <div class="border border-dashed border-gray-300 rounded p-4 text-center bg-light-primary">
                            <input type="file" name="photo" id="photo" class="d-none" accept="image/*">
                            <div id="upload-placeholder">
                                <i class="fa fa-cloud-upload-alt fa-3x text-muted mb-3"></i>
                                <h6 class="text-muted mb-2">Drop your image here or click to browse</h6>
                                <p class="text-muted fs-7 mb-3">Supports JPG, PNG, GIF up to 5MB</p>
                                <label for="photo" class="btn btn-primary btn-sm">
                                    <i class="fa fa-plus me-1"></i> Choose Image
                                </label>
                            </div>
                            <div id="image-preview" class="d-none">
                                <img id="preview-img" src="" alt="Preview" class="img-fluid rounded mb-3"
                                    style="max-height: 200px;">
                                <div class="d-flex align-items-center justify-content-center gap-2">
                                    <span id="file-name" class="text-muted"></span>
                                    <button type="button" id="remove-image" class="btn btn-sm btn-light-danger">
                                        <i class="fa fa-times"></i> Remove
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Buttons -->
                    <div class="d-flex justify-content-end gap-3">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                            <i class="fa fa-arrow-left me-2"></i>Cancel
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-rocket me-2"></i>Create Course
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const photoInput = document.getElementById('photo');
            const uploadPlaceholder = document.getElementById('upload-placeholder');
            const imagePreview = document.getElementById('image-preview');
            const previewImg = document.getElementById('preview-img');
            const fileName = document.getElementById('file-name');
            const removeButton = document.getElementById('remove-image');

            photoInput.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        previewImg.src = e.target.result;
                        fileName.textContent = file.name;
                        uploadPlaceholder.classList.add('d-none');
                        imagePreview.classList.remove('d-none');
                    };
                    reader.readAsDataURL(file);
                }
            });

            removeButton.addEventListener('click', function() {
                photoInput.value = '';
                previewImg.src = '';
                fileName.textContent = '';
                uploadPlaceholder.classList.remove('d-none');
                imagePreview.classList.add('d-none');
            });
        });
    </script>
@endpush
