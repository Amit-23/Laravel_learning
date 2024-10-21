@extends('admin.layouts.app')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Dashboard- Admin</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Dashboard v1</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">

    @if(session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
    @endif

    <!-- Add New Task Button -->
    <div class="mb-3">
      <a href="{{ route('tasks.create') }}" class="btn btn-primary">Add New Task</a>
    </div>

    <!-- Task Table -->
    <table class="table table-striped table-bordered">
      <tr>
        <th>ID</th>
        <th>Description</th>
        <th>Delete</th>
        <th>Update</th>
      </tr>

      @if(Session::has('tasks'))
      @foreach(Session::get('tasks') as $task)
      <tr>
        <td>{{ $task->id }}</td> <!-- Display task ID -->
        <td>{{ $task->description }}</td> <!-- Display task description -->

        <!-- Delete Button -->
        <td>
          <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
          </form>
        </td>

        <!-- Update Button -->
        <td>
          <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning btn-sm">Update</a>
        </td>
      </tr>
      @endforeach
      @else
      <tr>
        <td colspan="4">No tasks found.</td>
      </tr>
      @endif
    </table>

  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

@endsection