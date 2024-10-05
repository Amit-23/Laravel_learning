<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>

  <div class="container my-5">
    <div class="row justify-content-center">
      <div class="col-lg-6 col-md-8 col-sm-10">
        <h1 class="text-center mb-4">User Details</h1>

        @foreach($data as $item)
        <div class="card mb-3">
          <div class="card-body">
            <h5 class="card-title">User #{{$item->id}}</h5>
            <p class="card-text">
              <strong>Name:</strong> {{$item->name}} <br>
              <strong>Email:</strong> {{$item->email}} <br>
              <strong>Age:</strong> {{$item->age}} <br>
              <strong>City:</strong> {{$item->city}} 
            </p>
          </div>
        </div>
        @endforeach
        
        <div class="text-center mt-4">
          <a href="{{route('list')}}" class="btn btn-danger">Cancel</a>
        </div>
      </div>
    </div>
  </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
