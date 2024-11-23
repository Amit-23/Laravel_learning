@extends('admin.layouts.adminlayout')
@section('content')

<section class="content">
    <div class="container-fluid">
        
        <!-- Success Message Alert -->
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
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

                                <!-- Delete Icon -->
                                <form action="{{ route('admin.destroyuser', $user->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger p-1" title="Delete" onclick="return confirm('Are you sure?')">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

@endsection
