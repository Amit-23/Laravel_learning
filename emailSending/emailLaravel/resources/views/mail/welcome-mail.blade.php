<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$request['message']}}</title>
</head>
<body>
    <h3>Hello Admin</h3>
  <p>Name : {{$request['name']}}</p>
  <p>Email : {{$request['email']}}</p>
  <p>Subject : {{$request['subject']}}</p>
  <p>Message : {{$request['message']}}</p>
</body>
</html>