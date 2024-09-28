<div>
    <!-- Order your soul. Reduce your wants. - Augustine -->

   <table border="1">

   <tr>
    <td>Name</td>
    <td>email</td>
    <td>batch</td>
   </tr>
   @foreach($data as $student)
   <tr>
   <td>{{$student->name}}</td>
   <td>{{$student->email}}</td>
   <td>{{$student->batch}}</td>
   </tr>
   @endforeach
   </table>
</div>
