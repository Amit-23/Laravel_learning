@extends('user.userlayout.main-layout')
@section('content')

<form action="{{ route('user.update', $task->id) }}" method="POST">
    @csrf
    @method('PUT')
    
    <pre>
        @if($errors->any())
            {{ print_r($errors->all()) }}
        @endif
    </pre>

    <div class="mb-3">
        <label for="name" class="form-label">Task Name</label>
        <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $task->name) }}">
    </div>

    <div class="mb-3">
        <label for="taskStatus" class="form-label">Status</label>
        <select class="form-control" id="taskStatus" name="status" required>
            <option value="">Select status</option>
            <option value="inprogress" {{ old('status', $task->status) == 'inprogress' ? 'selected' : '' }}>In Progress</option>
            <option value="overdue" {{ old('status', $task->status) == 'overdue' ? 'selected' : '' }}>Overdue</option>
            <option value="completed" {{ old('status', $task->status) == 'completed' ? 'selected' : '' }}>Completed</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="task_description" class="form-label">Task Description</label>
        <input type="text" class="form-control" name="task_description" id="task_description" value="{{ old('task_description', $task->task_description) }}">
    </div>

    <div class="mb-3">
        <label for="duedate" class="form-label">Due Date</label>
        <input type="text" class="form-control" name="duedate" id="duedate" value="{{ old('duedate', $task->duedate) }}">
    </div>

    <div class="mb-3">
        <input type="submit" value="Save" class="btn btn-success">
    </div>

</form>
@endsection
