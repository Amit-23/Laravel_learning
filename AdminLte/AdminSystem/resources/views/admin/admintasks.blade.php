@extends('admin.layouts.adminlayout')
@section('content')

<section class="content">
    <!-- Table -->
    <a href="#" class="btn btn-primary" title="Add" data-bs-toggle="modal" data-bs-target="#addTaskModal">
        <i class="fas fa-plus"></i> Add
    </a>


    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif 

    <table id="myTable" class="display">
        <thead>
            <tr>
                <th>Name</th>
                <th>Status</th>
                <th>Task Description</th>
                <th>Created At</th>
                <th>Due Date</th>
                <th>Assigned To</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($totalTasks as $task)
            <tr>
                <td>{{ $task->name }}</td>
                <td>{{ $task->status }}</td>
                <td>{{ $task->task_description }}</td>
                <td>{{ $task->created_at }}</td>
                <td>{{ $task->duedate ?? '...' }}</td>
                <td>{{ $task->assigned_to_name ?? '...' }}</td>
                <td>
                    <!-- View Icon -->
                    <a href="{{ route('admintask.show', $task->id) }}" class="text-primary" title="View">
                        <i class="fas fa-eye"></i>
                    </a>

                    <!-- Edit Icon -->
                    <a href="{{ route('user.edit', $task->id) }}" class="text-secondary mx-2" title="Edit">
                        <i class="fas fa-edit"></i>
                    </a>

                    <!-- Delete Icon -->
                    <form action="{{ route('admin.destroy', $task->id) }}" method="POST" class="action-form">
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

    
<!-- Bootstrap Modal for Adding a Task -->
<div class="modal fade" id="addTaskModal" tabindex="-1" aria-labelledby="addTaskModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addTaskModalLabel">Add New Task</h5>
                <button type="button"  class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addTaskForm" action="{{route('admin.admincreatetask')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="taskName" class="form-label">Task Name</label>
                        <input type="text" class="form-control" id="taskName" name="name" required>
                    </div>


                    <div class="mb-3">
                        <label for="taskStatus" class="form-label">Status</label>
                        <select class="form-control" id="taskStatus" name="status">
                            <option value="">Select status</option>
                            <option value="inprogress">In Progress</option>
                            <option value="overdue">Overdue</option>
                            <option value="completed">Completed</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="taskDescription" class="form-label">Task Description</label>
                        <textarea class="form-control" id="taskDescription" name="task_description" rows="3" required></textarea>
                    </div>


                   <div class="mb-3">
                    <label for="assigned_to_name" class="form-label">Assign To</label>

                    <select class="form-control" name="assigned_to_name" id="assigned_to_name">
                        <option value="">Select Agent</option>

                        @foreach($userslist as $user)
                        <option value="{{$user->id}}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                   </div>

                 
                    <div class="mb-3">
                        <label for="dueDate" class="form-label">Due Date</label>
                        <input type="date" class="form-control" id="dueDate" name="duedate">
                    </div>
                    <button type="submit" class="btn btn-primary">Add Task</button>
                </form>
            </div>
        </div>
    </div>
</div>
</section>

@endsection