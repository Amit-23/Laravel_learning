<!DOCTYPE html>
<html>
<head>
    <title>New Task Assigned</title>
</head>
<body>
    <h1>Hello, {{ $task['assigned_to_name'] }}</h1>
    <p>You have been assigned a new task. Here are the details:</p>

    <ul>
        <li><strong>Task Name:</strong> {{ $task['name'] }}</li>
        <li><strong>Status:</strong> {{ $task['status'] }}</li>
        <li><strong>Description:</strong> {{ $task['task_description'] }}</li>
        <li><strong>Due Date:</strong> {{ $task['duedate'] }}</li>
        <li><strong>Assigned By:</strong> {{ $task['created_by_name'] }}</li>
    </ul>

    <p>Please complete the task by the due date.</p>
</body>
</html>
