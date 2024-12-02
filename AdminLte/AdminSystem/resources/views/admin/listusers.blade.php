@extends('admin.layouts.adminlayout')
@section('content')

<section class="content">
    <div class="container-fluid">

        <!-- Add User Button -->
        <div class="d-flex justify-content-end mb-3">
            <a href="#" class="btn btn-primary" title="Add User" data-bs-toggle="modal" data-bs-target="#addUserModal">
                <i class="fas fa-plus"></i> Add User
            </a>
        </div>

        <!-- Success Message Alert -->
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif


        <!-- Error message alert -->
          @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif



        <!-- DataTable -->
        <div class="table-responsive">
            <table id="myTable" class="display table table-bordered table-hover" style="width:100%">
                <thead class="table-light">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center align-items-center gap-1">
                                <!-- View Icon -->
                                <a href="{{ route('admin.show', $user->id) }}" class="btn btn-sm btn-info p-1" title="View">
                                    <i class="fas fa-eye"></i>
                                </a>

                                <!-- Edit Icon -->
                                <a href="{{route('admin.editUserDetails', $user->id)}}" class="btn btn-sm btn-warning mx-1" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <!-- Delete Icon -->
                                <button type="button" class="btn btn-sm btn-danger p-1" title="Delete"
                                    data-bs-toggle="modal" data-bs-target="#deleteConfirmationModal"
                                    onclick="setDeleteAction('{{ route('admin.destroyuser', $user->id) }}')">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Add User Modal -->
        <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title" id="addUserModalLabel">Add New User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="addUserForm" action="{{ route('admin.adminCreateUser') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="userName" class="form-label">Name</label>
                                <input type="text" class="form-control" id="userName" name="name" required>
                            </div>

                            <div class="mb-3">
                                <label for="userEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" id="userEmail" name="email" required>
                            </div>

                            <div class="mb-3">
                                <label for="userPassword" class="form-label">Password</label>
                                <input type="password" class="form-control" id="userPassword" name="password" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Add User</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Delete Confirmation Modal -->
        <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title" id="deleteConfirmationModalLabel">Confirm Deletion</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this user? This action cannot be undone.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <form id="deleteUserForm" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<script>
    function setDeleteAction(action) {
        const form = document.getElementById('deleteUserForm');
        form.action = action;
    }
</script>

@endsection
