<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <h1>Add New User</h1>
        @if ($errors->any())
<!-- 
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)

            <li>{{$error}}</li>

            @endforeach
        </ul> -->


        @endif


        <form action="{{route ('addUser')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="username" class="form-label">Name</label>
                <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value=" {{old('username')}}">

                <span class="text-danger">
                    @error('username')

                    {{ $message}}

                    @enderror
                </span>

                <div class="mb-3">
                    <label for="useremail" class="form-label">Email</label>
                    <input type="text" class="form-control  @error('useremail') is-invalid @enderror" id="useremail" name="useremail" value="{{old('useremail')}}">
                </div>
                
                <span  class="text-danger">
                    @error('useremail')

                    {{ $message}}

                    @enderror
                </span>

                <div class="mb-3">
                    <label for="userage" class="form-label">Age</label>
                    <input type="text" class="form-control  @error('userage') is-invalid @enderror" id="userage" name="userage" value="{{old('userage')}}">
                </div>
                
                <span  class="text-danger">
                    @error('userage')

                    {{ $message}}

                    @enderror
                </span>


                <div class="mb-3">
                    <label for="usercity" class="form-label  @error('usercity') is-invalid @enderror">City</label>
                    <select class="form-control" id="usercity" name="usercity">
                        <option value="delhi">Delhi</option>
                        <option value="mumbai">Mumbai</option>
                        <option value="goa">Goa</option>
                        <option value="pune">Pune</option>

                    </select>
                </div>
                
                <span  class="text-danger">
                    @error('usercity')

                    {{ $message}}

                    @enderror
                </span>

                <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>