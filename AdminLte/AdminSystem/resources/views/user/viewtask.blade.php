<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="bg-light d-flex justify-content-center align-items-center" style="min-height: 100vh;">

<div class="container mt-5">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white text-center">
            <h3>Task Details</h3>
        </div>
        <div class="card-body p-4">
            <table class="table table-striped table-bordered mb-4">
                <tr>
                    <th width="150px">Task Name</th>
                    <td>{{ $task->name ?? '...' }}</td>
                </tr>
                <tr>
                    <th>Task Status</th>
                    <td>{{ $task->status ?? '...' }}</td>
                </tr>
                <tr>
                    <th>Task Description</th>
                    <td>{{ $task->task_description ?? '...' }}</td>
                </tr>
                <tr>
                    <th>Due Date</th>
                    <td>{{ $task->duedate ?? '...' }}</td>
                </tr>
            </table>
            <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
