<div>

{{print_r(session('allData'))}}
  <h1>Profile Page</h1>

  @if(session('user'))
  <h1>welcome, {{session('user')}}</h1>
  @else
  <h3>No user found in session</h3>
  @endif

  <a href="logout">Logout</a>
</div>
