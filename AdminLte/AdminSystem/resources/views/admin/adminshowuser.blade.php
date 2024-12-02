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

    /* Button container for alignment */
    .button-container {
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    /* Custom heading styling */
    .section-heading {
        font-size: 1.5em;
        font-weight: bold;
        color: #34495e;
        margin-bottom: 10px;
    }

    .section-subheading {
        font-size: 1em;
        color: #7f8c8d;
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
    <h2 class="section-heading">User Information</h2>
    <p class="section-subheading">Details of the selected user</p>

    <!-- User Details Table -->
    <table class="custom-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td data-label="ID">{{ $user->id }}</td>
                <td data-label="Name">{{ $user->name }}</td>
                <td data-label="Email">{{ $user->email }}</td>
            </tr>
        </tbody>
    </table>
</div>

@endsection
