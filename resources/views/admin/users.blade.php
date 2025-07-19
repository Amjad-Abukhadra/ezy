@extends('admin.app')

@section('title', 'Admin - Users')

@section('page_title', 'Users Management')

@section('content')
    <div class="card shadow-sm mb-5">
        <div class="card-header d-flex justify-content-between align-items-center bg-primary text-white">
            <h4 class="mb-0"><i class="fa fa-users me-2"></i>Users List</h4>
            <span class="badge bg-info fs-6">Total: {{ count($users) }}</span>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered align-middle text-center" id="usersTable">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $index => $user)
                            <tr id="user-row-{{ $user->id }}">
                                <td>{{ $index + 1 }}</td>
                                <td class="user-name fw-semibold">{{ $user->name }}</td>
                                <td class="user-email text-muted">{{ $user->email }}</td>
                                <td class="user-role">
                                    @foreach ($user->roles as $role)
                                        <span class="badge bg-{{ $role->name == 'admin' ? 'danger' : ($role->name == 'trainer' ? 'success' : 'secondary') }} me-1 text-capitalize">{{ $role->name }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-light-primary editUserBtn me-1" data-bs-toggle="tooltip" title="Edit User" data-user-id="{{ $user->id }}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="#" class="btn btn-sm btn-light-danger deleteUserBtn" data-bs-toggle="tooltip" title="Delete User" data-user-id="{{ $user->id }}">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Edit User Modal -->
    <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="editUserForm">
                @csrf
                <input type="hidden" name="user_id" id="editUserId" />
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title" id="editUserModalLabel"><i class="fa fa-edit me-2"></i>Edit User</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="editUserName" class="form-label">Name</label>
                            <input type="text" class="form-control" id="editUserName" name="name" required />
                        </div>
                        <div class="mb-3">
                            <label for="editUserEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="editUserEmail" name="email" required />
                        </div>
                        <div class="mb-3">
                            <label for="editUserRole" class="form-label">Role</label>
                            <select class="form-select" id="editUserRole" name="role" required>
                                <option value="admin">Admin</option>
                                <option value="student">Student</option>
                                <option value="trainer">Trainer</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="deleteUserForm">
                @csrf
                @method('DELETE')
                <input type="hidden" name="user_id" id="deleteUserId">
                <div class="modal-content">
                    <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title"><i class="fa fa-trash me-2"></i>Confirm Deletion</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-warning mb-0">
                            <i class="fa fa-exclamation-triangle me-2"></i>Are you sure you want to delete this user?
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Yes, Delete</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    
    <script>
        $(document).ready(function() {
            // When Edit button clicked
            $('.editUserBtn').click(function(e) {
                e.preventDefault();
                let userId = $(this).data('user-id');
                // AJAX request to get user data
                $.ajax({
                    url: '/admin/users/' + userId + '/edit',
                    method: 'GET',
                    success: function(data) {
                        // Populate the form fields in modal
                        $('#editUserId').val(data.id);
                        $('#editUserName').val(data.name);
                        $('#editUserEmail').val(data.email);
                        $('#editUserRole').val(data.role); // 👈 Set role dropdown
                        // Show modal
                        var editModal = new bootstrap.Modal(document.getElementById('editUserModal'));
                        editModal.show();
                    },
                    error: function() {
                        alert('Failed to fetch user data.');
                    }
                });
            });
        });
        $('#editUserForm').submit(function(e) {
            e.preventDefault();
            let userId = $('#editUserId').val();
            let formData = $(this).serialize();
            $.ajax({
                url: "{{ url('admin/users') }}/" + userId,
                method: 'POST',
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    // Hide modal
                    var editModalEl = document.getElementById('editUserModal');
                    var editModal = bootstrap.Modal.getInstance(editModalEl);
                    editModal.hide();
                    // Update table row
                    let row = $('#user-row-' + userId);
                    row.find('.user-name').text($('#editUserName').val());
                    row.find('.user-email').text($('#editUserEmail').val());
                    row.find('.user-role').html('<span class="badge bg-' +
                        ($('#editUserRole').val() == 'admin' ? 'danger' : ($('#editUserRole').val() == 'trainer' ? 'success' : 'secondary')) +
                        ' text-capitalize">' + $('#editUserRole').val() + '</span>');
                }
            });
        });
        // Open delete modal
        $('.deleteUserBtn').click(function(e) {
            e.preventDefault();
            let userId = $(this).data('user-id');
            $('#deleteUserId').val(userId);
            var deleteModal = new bootstrap.Modal(document.getElementById('deleteUserModal'));
            deleteModal.show();
        });
        // Submit delete form
        $('#deleteUserForm').submit(function(e) {
            e.preventDefault();
            let userId = $('#deleteUserId').val();
            $.ajax({
                url: "{{ url('admin/users/') }}/" + userId,
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    // Hide modal
                    var deleteModalEl = document.getElementById('deleteUserModal');
                    var deleteModal = bootstrap.Modal.getInstance(deleteModalEl);
                    deleteModal.hide();
                    // Remove user row
                    $('#user-row-' + userId).remove();
                },
                error: function() {
                    alert('Failed to delete user.');
                }
            });
        });
    </script>
@endpush
