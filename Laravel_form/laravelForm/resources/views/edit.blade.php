<div>
  
<h1>Update Student Data</h1>

<form action="/edit-student/{{$data->id}}" method="post">
    @csrf

    <input type="hidden" name="_method" value="put" />

    <input type="text" name="name" value="{{$data->name}}" placeholder="Enter Name" />
    <br><br>
    <input type="text" name="email" value="{{$data->email}}" placeholder="Enter Email" />
    <br><br>
    <input type="text" name="phone" value="{{$data->phone}}" placeholder="Enter Phone" />
    <br><br>
    <button>Update</button>
    <a href="/list">Cancel</a>
</form>
</div>
