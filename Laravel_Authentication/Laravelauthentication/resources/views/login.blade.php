<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-5 mt-5">
                <div class="card">
                    <div class="card-header">
                        <h3>Login</h3>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('loginMatch') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="useremail" class="form-label">Email Address</label>
                                <input type="email" name="email" class="form-control" id="useremail" value="{{ old('email') }}">
                            </div>

                            <div class="mb-3">
                                <label for="userpassword" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="userpassword">
                            </div>

                            <button type="submit" class="btn btn-primary">Login</button>
                            <a href="/" class="btn btn-secondary">Back</a>
                        </form>
                    </div>
                </div>

                <!-- Error display -->
                @if ($errors->any())
                <div class="alert alert-danger mt-3">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
