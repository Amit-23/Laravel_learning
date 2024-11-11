@extends('user.userlayout.main-layout')

@section('content')
<style>
    /* Add border to table cells */
    #myTable thead th,
    #myTable tbody td {
        border: 1px solid #ddd;
        padding: 8px;
    }

    /* Additional styling for the table */
    #myTable {
        border-collapse: collapse;
        width: 100%;
    }

    /* Styling for the table header */
    #myTable thead th {
        background-color: #f2f2f2;
        text-align: left;
    }

    /* Center align icons in the Action column */
    #myTable tbody td .fas {
        font-size: 1.1em;
    }

    /* Styling for form in the Action column */
    .action-form {
        display: inline;
    }
</style>

<!-- Add Task Button to open Modal -->
<a href="#" class="btn btn-primary" title="Add" data-bs-toggle="modal" data-bs-target="#addTaskModal">
    <i class="fas fa-plus"></i> Add
</a>

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
            <th>Status</th>
            <th>Task Description</th>
            <th>Created At</th>
            <th>Due Date</th>
            <th>Created By</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($allTasks as $task)
        <tr>
            <td>{{ $task->name }}</td>
            <td>{{ $task->status }}</td>
            <td>{{ $task->task_description }}</td>
            <td>{{ $task->created_at }}</td>
            <td>{{ $task->duedate ?? '...' }}</td>
            <td>{{ $task->created_by_name }}</td>
            <td>
                <!-- View Icon -->
                <a href="{{ route('user.show', $task->id) }}" class="text-primary" title="View">
                    <i class="fas fa-eye"></i>
                </a>

                <!-- Edit Icon -->
                <a href="{{ route('user.edit', $task->id) }}" class="text-secondary mx-2" title="Edit">
                    <i class="fas fa-edit"></i>
                </a>

                <!-- Delete Icon -->
                <form action="{{ route('user.destroy', $task->id) }}" method="POST" class="action-form">
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
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addTaskForm" action="{{route('tasks.createtask')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="taskName" class="form-label">Task Name</label>
                        <input type="text" class="form-control" id="taskName" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="taskStatus" class="form-label">Status</label>
                        <select class="form-control" id="taskStatus" name="status" required>
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
                        <label for="dueDate" class="form-label">Due Date</label>
                        <input type="date" class="form-control" id="dueDate" name="duedate">
                    </div>
                    <button type="submit" class="btn btn-primary">Add Task</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection 