@extends('user.userlayout.main-layout')
@section('content')

<style>
    /* Reuse the same styles from adminEditTask.blade.php */
    .table-container {
        margin: 20px auto;
        padding: 20px;
        background-color: #f4f6f8;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        max-width: 90%;
    }

    .custom-table {
        width: 100%;
        border-collapse: collapse;
        font-size: 1em;
        background-color: #ffffff;
        border-radius: 12px;
        overflow: hidden;
    }

    .custom-table thead th {
        background-color: #34495e;
        color: #ffffff;
        padding: 15px;
        text-align: left;
        font-weight: bold;
    }

    .custom-table tbody td {
        padding: 15px;
        border-bottom: 1px solid #e0e0e0;
    }

    .custom-table tbody tr:nth-of-type(even) {
        background-color: #f9f9f9;
    }

    .badge {
        padding: 5px 10px;
        font-size: 0.85em;
        border-radius: 8px;
    }

    .button-container {
        display: flex;
        justify-content: space-between; /* Align buttons at opposite ends */
        margin-top: 20px;
    }

    .btn-custom {
        padding: 8px 20px;
        font-size: 1em;
        font-weight: bold;
        background-color: #34495e;
        color: #ffffff;
        border: none;
        border-radius: 8px;
        transition: background-color 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 5px;
    }

    .btn-custom:hover {
        background-color: #2c3e50;
    }

    @media (max-width: 768px) {
        .custom-table thead {
            display: none;
        }

        .custom-table tbody td {
            display: block;
            text-align: right;
            padding-left: 50%;
            position: relative;
        }

        .custom-table tbody td::before {
            content: attr(data-label);
            position: absolute;
            left: 0;
            width: 50%;
            padding-left: 15px;
            font-weight: bold;
            color: #616161;
            background-color: #f5f5f5;
        }
    }
</style>

<div class="table-container">
    <!-- Success Message Alert -->
    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ implode(', ', $errors->all()) }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Edit Task Form -->
    <form action="{{ route('user.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Task Details Table -->
        <table class="custom-table">
            <thead>
                <tr>
                    <th>Task Name</th>
                    <th>Task Status</th>
                    <th>Task Description</th>
                    <th>Due Date</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td data-label="Task Name">
                        <input type="text" name="name" class="form-control" value="{{ old('name', $task->name) }}">
                    </td>
                    <td data-label="Task Status">
                        <select name="status" class="form-control">
                            <option value="inprogress" @if(old('status', $task->status) == 'inprogress') selected @endif>In Progress</option>
                            <option value="completed" @if(old('status', $task->status) == 'completed') selected @endif>Completed</option>
                            <option value="overdue" @if(old('status', $task->status) == 'overdue') selected @endif>Overdue</option>
                        </select>
                    </td>
                    <td data-label="Task Description">
                        <textarea name="task_description" class="form-control">{{ old('task_description', $task->task_description) }}</textarea>
                    </td>
                    <td data-label="Due Date">
                        <input type="date" name="duedate" class="form-control" value="{{ old('duedate', $task->duedate) }}">
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- Button Container for Back and Save -->
        <div class="button-container">
            <!-- Back Button -->
            <a href="{{ route('userdashboard') }}" class="btn btn-custom">
                <i class="fas fa-arrow-left"></i> Back
            </a>
            <!-- Save Changes Button -->
            <button type="submit" class="btn btn-custom">
                <i class="fas fa-save"></i> Save Changes
            </button>
        </div>
    </form>
</div>
@endsection
