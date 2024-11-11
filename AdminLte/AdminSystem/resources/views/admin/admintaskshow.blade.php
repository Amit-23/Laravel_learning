@extends('admin.layouts.adminlayout')
@section('content')

<style>
    /* Table container for spacing */
    .table-container {
        margin: 20px;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }

    /* Custom table styling */
    .custom-table {
        width: 100%;
        border-collapse: collapse;
        font-size: 1em;
        background-color: #ffffff;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        border-radius: 8px;
    }

    .custom-table thead th {
        background-color: #00796b;
        color: #ffffff;
        text-align: left;
        padding: 15px;
    }

    .custom-table tbody td {
        padding: 12px 15px;
        border-bottom: 1px solid #e0e0e0;
    }

    .custom-table tbody tr:nth-of-type(even) {
        background-color: #f9f9f9;
    }

    .custom-table tbody tr:last-of-type td {
        border-bottom: none;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .custom-table thead {
            display: none;
        }

        .custom-table tbody td {
            display: block;
            text-align: right;
            position: relative;
            padding-left: 50%;
        }

        .custom-table tbody td::before {
            content: attr(data-label);
            position: absolute;
            left: 0;
            width: 50%;
            padding-left: 15px;
            font-weight: bold;
            color: #616161;
            text-align: left;
            background-color: #f5f5f5;
        }
    }

    /* Back button styling */
    .back-button {
        display: inline-block;
        margin-bottom: 20px;
        padding: 10px 20px;
        background-color: #00796b;
        color: #ffffff;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .back-button:hover {
        background-color: #004d40;
    }
</style>

<div class="table-container">

    <!-- Back Button -->
    <a href="{{ url()->previous() }}" class="back-button">Back</a>

    <!-- Table -->
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
                <td data-label="Task Status">{{ $task->status }}</td>
                <td data-label="Task Description">{{ $task->task_description }}</td>
                <td data-label="Due Date">{{ $task->duedate ?? '...' }}</td>
                <td data-label="Assigned To">{{ $task->assigned_to_name }}</td>
            </tr>
        </tbody>
    </table>
</div>

@endsection
