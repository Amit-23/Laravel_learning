@extends('user.userlayout.main-layout')

@section('content')
<style>
    /* Custom table styling */
    .custom-table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
        font-size: 1em;
        text-align: left;
        background-color: #ffffff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
    }

    .custom-table thead th {
        background-color: #009879;
        color: #ffffff;
        text-align: left;
        padding: 12px 15px;
    }

    .custom-table tbody td {
        padding: 12px 15px;
        border-bottom: 1px solid #dddddd;
    }

    .custom-table tbody tr:nth-of-type(even) {
        background-color: #f3f3f3;
    }

    .custom-table tbody tr:last-of-type {
        border-bottom: 2px solid #009879;
    }

    .custom-table tbody td .fas {
        font-size: 1.2em;
        color: #009879;
        cursor: pointer;
    }

    .custom-table tbody td .fas:hover {
        color: #006f5b;
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
            text-align: left;
            background-color: #f3f3f3;
        }
    }
</style>

<!-- Table -->
<table class="custom-table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Status</th>
            <th>Task Description</th>
            <th>Created At</th>
            <th>Due Date</th>
            <th>Created By</th>
          
        </tr>
    </thead>
    <tbody>
        <tr>
            <td data-label="Name">{{ $task->name }}</td>
            <td data-label="Status">{{ $task->status }}</td>
            <td data-label="Task Description">{{ $task->task_description }}</td>
            <td data-label="Created At">{{ $task->created_at }}</td>
            <td data-label="Due Date">{{ $task->duedate ?? '...' }}</td>
            <td data-label="Created By">{{ $task->created_by_name }}</td>
           
        </tr>
    </tbody>
</table>
@endsection
