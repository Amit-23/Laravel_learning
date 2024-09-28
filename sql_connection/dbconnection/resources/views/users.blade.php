<h1>Users List</h1>
<table border="1">

    <tr>

        <td>Name</td>
        <td>email</td>
        <td>phone</td>
    </tr>

    @foreach($users as $user)

    <tr>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->phone}}</td>

    </tr>  

    @endforeach
</table>