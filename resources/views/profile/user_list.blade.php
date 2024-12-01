<x-app-layout>
    <x-slot name="title">
        <h1 style="margin: 35px; font-size: 30px;">Manage Users</h1>
        <div id="response" class="alert alert-success" style="display:none; width: auto;">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <div class="message"></div>
        </div>

        <div class="container mt-5" style="width:auto;">
            <!-- DataTable Panel -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>User List</h3>
                </div>
                <div class="panel-body">
                    <!-- Success Message -->
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Error Message -->
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <!-- DataTable -->
                    <div class="box box-warning">
                        <div class="box-body">
                            <div class="container-fluid">
                                <div class="table-responsive">
                                    <table id="userTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Username</th>
                                                <th>Role</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- Data will be loaded dynamically --}}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit User Modal -->
        <div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form id="editUserForm">
                    @csrf
                    @method('PUT')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" id="editUserId">
                            <div class="form-group">
                                <label for="editName">Name</label>
                                <input type="text" class="form-control" id="editName" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="editRole">Role</label>
                                <select class="form-control" id="editRole" name="role" required>
                                    @foreach(Config::get('constants.roles') as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="editPhone">Phone</label>
                                <input type="text" class="form-control" id="editPhone" name="phone" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </x-slot>
    <script>
        $(document).ready(function () {
            const table = $('#userTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('user.list') }}",
                    type: 'GET',
                },
                columns: [
                    { data: 'name', name: 'name' },
                    { data: 'username', name: 'username' },
                    { data: 'role', name: 'role' },
                    { data: 'email', name: 'email' },
                    { data: 'phone', name: 'phone' },
                    {
                        data: 'id',
                        render: function (data) {
                            return `
                        <button class="btn btn-warning btn-sm edit-btn" data-id="${data}">Edit</button>
                        <button class="btn btn-danger btn-sm delete-btn" data-id="${data}">Delete</button>
                    `;
                        },
                        orderable: false,
                        searchable: false
                    },
                ]
            });

            // Edit button click handler
            $('#userTable').on('click', '.edit-btn', function () {
                const userId = $(this).data('id');
                $.ajax({
                    url: `/user/${userId}/edit`,
                    type: 'GET',
                    success: function (user) {
                        $('#editUserId').val(user.id);
                        $('#editName').val(user.name);
                        $('#editRole').val(user.role);
                        $('#editPhone').val(user.phone);
                        $('#editUserModal').modal('show');
                    }
                });
            });

            // Save changes on edit form
            $('#editUserForm').submit(function (e) {
                e.preventDefault();
                const userId = $('#editUserId').val();
                $.ajax({
                    url: `/user/${userId}`,
                    type: 'PUT',
                    data: $(this).serialize(),
                    success: function () {
                        $('#editUserModal').modal('hide');
                        table.ajax.reload();
                        alert('User updated successfully!');
                    }
                });
            });

            // Delete button click handler
            $('#userTable').on('click', '.delete-btn', function () {
                const userId = $(this).data('id');
                if (confirm('Are you sure you want to delete this user?')) {
                    $.ajax({
                        url: `/user/${userId}`,
                        type: 'DELETE',
                        success: function () {
                            table.ajax.reload();
                            alert('User deleted successfully!');
                        }
                    });
                }
            });
        });

        <script>
        </x-app-layout>