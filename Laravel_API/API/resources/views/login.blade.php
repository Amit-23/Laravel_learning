<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

  <div class="container mt-5">

    <div class="row">
      <div class="col-4">
        <div class="card">
          <div class="card-header">

            <h2>Login</h2>
          </div>
          <div class="card-body">

            <div class='mb-3'>
              <input type="email" id="email" class="form-control">
            </div>
            <div class='mb-3'>
              <input type="password" id="password" class="form-control">
            </div>
            <button id="loginButton" class="btn btn-primary">Login</button>

          </div>

          <div class="card-footer"></div>
        </div>
      </div>
    </div>

  </div>











  <script
    src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
    crossorigin="anonymous"></script>


    <script>

      $(document).ready(function(){
        $("#loginButton").on('click',function(){
          const email = $("#email").val();
          const password = $("#password").val();

          $.ajax({

            url : '/api/login',
            type: 'POST',
            contentType: 'application/json',
            data: JSON.stringify({

              email: email,
              password: password,
            }),

            sucess: function(response){
              console.log(response);
            }



          });
        });
      });


    </script>

























  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>