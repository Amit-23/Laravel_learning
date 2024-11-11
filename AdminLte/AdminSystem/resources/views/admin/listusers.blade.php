
@extends('admin.layouts.adminlayout')
@section('content')

<section class="content">


@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
    <!-- Table -->
<table id="myTable" class="display">
    <thead>
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
            
            <td>
                <!-- View Icon -->
                <a href="{{ route('admin.show', $user->id) }}" class="text-primary" title="View">
                    <i class="fas fa-eye"></i>
                </a>

                <!-- Edit Icon -->
                <!-- <a href="{{ route('user.edit', $user->id) }}" class="text-secondary mx-2" title="Edit">
                    <i class="fas fa-edit"></i>
                </a> -->
                <!-- Delete Icon -->
                <form action="{{ route('admin.destroy', $user->id) }}" method="POST" class="action-form">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-link text-danger p-0" title="Delete" onclick="return confirm('Are you sure?')">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</section>

@endsection