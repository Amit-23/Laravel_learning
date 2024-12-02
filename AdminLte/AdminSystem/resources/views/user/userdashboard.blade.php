@extends('user.userlayout.main-layout')
@section('content')

<section class="content">
    <div class="container-fluid">
        
        <!-- Add Task Button to open Modal -->
        <div class="d-flex justify-content-end mb-3">
            <a href="#" class="btn btn-primary" title="Add" data-bs-toggle="modal" data-bs-target="#addTaskModal">
                <i class="fas fa-plus"></i> Add Task
            </a>
        </div>

        <!-- Success Message Alert -->
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <!-- Table -->
        <div class="table-responsive">
            <table id="myTable" class="display table table-bordered table-hover" style="width:100%">
                <thead class="table-light">
                    <tr>
                        <th>{{__('common.name')}}</th>
                        <th>{{__('common.status')}}</th>
                        <th>{{__('common.task_description')}}</th>
                        <th>{{__('common.created_at')}}</th>
                        <th>{{__('common.due_date')}}</th>
                        <th>{{__('common.created_by')}}</th>
                        <th>{{__('common.action')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($allTasks as $task)
                    <tr>
                        <td>{{ $task->name }}</td>
                        <td>
                            <span class="badge 
                                @if($task->status === 'overdue') bg-danger
                                @elseif($task->status === 'inprogress') bg-warning text-dark
                                @elseif($task->status === 'completed') bg-success
                                @endif
                                rounded-pill">
                                {{ ucfirst($task->status) }}
                            </span>
                        </td>
                        <td>{{ $task->task_description }}</td>
                        <td>{{ $task->created_at }}</td>
                        <td>{{ $task->duedate ?? '...' }}</td>
                        <td>{{ $task->created_by_name }}</td>
                        <td class="text-center">
                            <div class="d-flex justify-content-around align-items-center">
                                <!-- View Icon -->
                                <a href="{{ route('user.show', $task->id) }}" class="btn btn-sm btn-info mx-1" title="View">
                                    <i class="fas fa-eye"></i>
                                </a>

                                <!-- Edit Icon -->
                                <a href="{{ route('user.edit', $task->id) }}" class="btn btn-sm btn-warning mx-1" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <!-- Delete Icon -->
                                <button type="button" class="btn btn-sm btn-danger mx-1" title="Delete"
                                    data-bs-toggle="modal" data-bs-target="#deleteConfirmationModal"
                                    onclick="setDeleteAction('{{ route('user.destroy', $task->id) }}')">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Add Task Modal -->
        <div class="modal fade" id="addTaskModal" tabindex="-1" aria-labelledby="addTaskModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title" id="addTaskModalLabel">Add New Task</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="addTaskForm" action="{{ route('tasks.createtask') }}" method="POST">
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

        <!-- Delete Confirmation Modal -->
        <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title" id="deleteConfirmationModalLabel">Confirm Deletion</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this task? This action cannot be undone.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <form id="deleteTaskForm" method="POST">
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
        const form = document.getElementById('deleteTaskForm');
        form.action = action;
    }
</script>

@endsection
