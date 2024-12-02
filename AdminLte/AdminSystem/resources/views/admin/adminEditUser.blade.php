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
        justify-content: space-between; /* Align buttons at opposite ends */
        margin-top: 20px;
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

    <!-- Edit Task Form -->
    <form action="{{ route('admin.adminUpdateUser', $user->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Using PUT method for updating -->

        <!-- Task Details Table -->
        <table class="custom-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created At</th>
                   
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td data-label="Name">
                        <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}">
                    </td>
                   
                   
                    <td data-label="Email">
                        <input type="text" name="email" class="form-control" value="{{ old('email', $user->email) }}">
                    </td>
                    <td data-label="Created At">
                        <input type="date" name="created_at" class="form-control" value="{{ old('created_at', $user->created_at) }}">
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- Button Container for Back and Save -->
        <div class="button-container">
            <!-- Back Button -->
            <a href="{{ route('registeredUsersList') }}" class="btn btn-custom">
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
