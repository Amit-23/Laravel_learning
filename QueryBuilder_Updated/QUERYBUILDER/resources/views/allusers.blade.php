<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Users List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="mb-0">Users List</h1>
            <a href="/newuser" class="btn btn-success btn-sm">Add New</a>
        </div>

        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Age</th>
                    <th scope="col">City</th>
                    <th scope="col">View</th>
                    <th scope="col">Delete</th>
                    <th scope="col">Update</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->age}}</td>
                    <td>{{$item->city}}</td>
                    <td><a href="{{ route('view.user', $item->id)}}" class="btn btn-primary btn-sm">View</a></td>
                    <td><a href="{{ route('delete.user', $item->id)}}" class="btn btn-danger btn-sm">Delete</a></td>
                    <td><a href="{{ route('update.page', $item->id)}}" class="btn btn-warning btn-sm">Update</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Center pagination below the table -->
        <div class="d-flex justify-content-center mt-4">
            {{ $data->links() }}
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>
