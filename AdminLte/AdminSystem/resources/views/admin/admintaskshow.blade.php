@extends('admin.layouts.adminlayout')
@section('content')

<style>
    /* Container styling for spacing and background */
    .table-container {
        margin: 20px auto;
        padding: 20px;
        background-color: #f4f6f8;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        max-width: 90%;
    }

    /* Custom table styling */
    .custom-table {
        width: 100%;
        border-collapse: collapse;
        font-size: 1em;
        background-color: #ffffff;
        border-radius: 12px;
        overflow: hidden;
    }

    /* Table header styling */
    .custom-table thead th {
        background-color: #34495e;
        color: #ffffff;
        padding: 15px;
        text-align: left;
        font-weight: bold;
    }

    /* Table body styling */
    .custom-table tbody td {
        padding: 15px;
        border-bottom: 1px solid #e0e0e0;
    }

    /* Zebra-striping rows */
    .custom-table tbody tr:nth-of-type(even) {
        background-color: #f9f9f9;
    }

    /* Badge styling for task status */
    .badge {
        padding: 5px 10px;
        font-size: 0.85em;
        border-radius: 8px;
    }

    /* Button container for alignment */
    .button-container {
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    /* Custom button styling */
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

    /* Modal header and body styling */
    .modal-header-custom {
        background-color: #34495e;
        color: #ffffff;
    }

    .modal-body-custom {
        padding: 20px;
        background-color: #f9f9f9;
    }

    .modal-footer .btn-primary {
        background-color: #34495e;
        border: none;
    }

    .modal-footer .btn-primary:hover {
        background-color: #2c3e50;
    }

    /* Responsive adjustments */
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
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Button Container for Back and Reassign -->
    <div class="button-container">
        <a href="{{ route('admintasks') }}" class="btn btn-custom">
            <i class="fas fa-arrow-left"></i> Back
        </a>
        <button type="button" class="btn btn-custom" data-bs-toggle="modal" data-bs-target="#reassignModal">
            <i class="fas fa-user-edit"></i> Reassign
        </button>
    </div>

    <!-- Task Details Table -->
    <table class="custom-table">
        <thead>
            <tr>
                <th>Task Name</th>
                <th>Task Status</th>
                <th>Task Description</th>
                <th>Due Date</th>
                <th>Assigned To</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td data-label="Task Name">{{ $task->name }}</td>
                <td data-label="Task Status">
                    <span class="badge
                        @if($task->status === 'overdue') bg-danger
                        @elseif($task->status === 'inprogress') bg-warning text-dark
                        @elseif($task->status === 'completed') bg-success
                        @endif rounded-pill">
                        {{ ucfirst($task->status) }}
                    </span>
                </td>
                <td data-label="Task Description">{{ $task->task_description }}</td>
                <td data-label="Due Date">{{ $task->duedate ?? '...' }}</td>
                <td data-label="Assigned To">{{ $task->assigned_to_name ?? '...' }}</td>
            </tr>
        </tbody>
    </table>
</div>

<!-- Reassign Modal -->
<div class="modal fade" id="reassignModal" tabindex="-1" aria-labelledby="reassignModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-custom">
                <h5 class="modal-title" id="reassignModalLabel">Reassign Task</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body modal-body-custom">
                <form action="{{ route('tasks.reassign', $task->id) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="newAssignee" class="form-label">Select New Assignee</label>
                        <select class="form-select" id="newAssignee" name="new_assignee" required>
                            <option value="" selected>Choose a Client</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Reassign Task</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
