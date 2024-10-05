<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <form action="{{ route('update.user',$data->id)}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="username" class="form-label">Name</label>
                <input type="text" class="form-control" id="username" name="username" value = "{{ $data->name}}">

            </div>
            <div class="mb-3">
                <label for="useremail" class="form-label">Email address</label>
                <input type="email" class="form-control" id="useremail" name="useremail" value="{{$data->email}}">

            </div>
            <div class="mb-3">
                <label for="userage" class="form-label">Age</label>
                <input type="text" class="form-control" id="userage" name="userage" value="{{$data->age}}">
            </div>
            <div class="mb-3">
                <label for="usercity" class="form-label">City</label>
                <input type="text" class="form-control" id="usercity" name="usercity" value = "{{$data->city}}">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>