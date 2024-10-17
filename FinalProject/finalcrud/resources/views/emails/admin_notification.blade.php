<!DOCTYPE html>
<html>
<head>
    <title>New User Registration</title>
</head>
<body>
    <h1>New User Registered</h1>
    <p>A new user has registered on the platform. Here are the details:</p>
    <p><strong>Name:</strong> {{ $user->name }}</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>
    <p><strong>Registered at:</strong> {{ $user->created_at }}</p>

    <p>Regards,<br>{{ config('app.name') }}</p>
</body>
</html>
