<div>
   
<form action="search" method="get">
    <input type="text" placeholder="Search with name" name="search" value="{{@$search}}" />
    <button>Search</button>
</form>
<table  border='1'>
    <tr>
        <td>Name</td>
        <td>Email</td>
        <td>Phone</td>
        <td>Created_at</td>
        <td>Operation</td>
    </tr>

    @foreach($students as $student)
    <tr>
        <td>{{$student->name}}</td>
        <td>{{$student->email}}</td>
        <td>{{$student->phone}}</td>
        <td>{{$student->created_at}}</td>
        <td>
            <a href="{{'delete/'.$student->id}}">Delete</a>
            <a href="{{'edit/'.$student->id}}">Edit</a>
        </td>
    </tr>
    @endforeach

   
</table>

{{$students->links()}}
</div>

<style>
    .w-5.h-5{
        width: 18px;
    }
</style>

