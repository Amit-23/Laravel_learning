<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <h1>Contact Form</h1>

   <div class="container">
     <form action="{{ route('contact') }}" method="POST" enctype="multipart/form-data">
        @csrf

        @if (session('success'))

        {{ session('success') }}
        @elseif (session('error'))
        {{ session('error') }}


        @endif
  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control" id="name" name="name">
    @error('name')
    <p class="text-danger">{{$message}}</p>
    @enderror
   
  </div>


  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email">
     @error('email')
    <p class="text-danger">{{$message}}</p>
    @enderror
  </div>

  <div class="mb-3">
    <label for="subject" class="form-label">Subject</label>
    <input type="text" class="form-control" id="subject" name="subject">
     @error('subject')
    <p class="text-danger">{{$message}}</p>
    @enderror
  </div>

  <div class="mb-3">
    <label for="message" class="form-label">Message</label>
    <input type="text" class="form-control" id="message" name="message">
     @error('message')
    <p class="text-danger">{{$message}}</p>
    @enderror
  </div>

  <div class="mb-3">
    <label for="attachment" class="form-label">Attach File</label>
    <input type="file" class="form-control" id="attachment" name="attachment">
     @error('attachment')
    <p class="text-danger">{{$message}}</p>
    @enderror
  </div>


  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
   </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>