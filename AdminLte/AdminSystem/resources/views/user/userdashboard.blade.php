    @extends('user.userlayout.main-layout')

    @section('content')

    <table id="myTable" class="display">
        <thead>
            <tr>
                <th>Name</th>
                <th>Task Description</th>
                <th>Created At</th>
                <th>Due Date</th>
                <th>Created By</th>
               
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($allTasks as $task)
            <tr>
                <td>{{ $task->name }}</td>
                <td>{{ $task->task_description }}</td>
                <td>{{ $task->created_at}}</td>
                <td>{{ $task->duedate}}</td>
                <td>{{ $task->created_by }}</td> <!-- Assuming a relationship 'creator' with User model -->
               
                <td>
                    <a href="{{ route('user.show',$task->id) }}" class="btn btn-primary">View</a>

                    <a href="{{ route('user.edit',$task->id) }}" class="btn btn-secondary">Update</a>



                    <form action="{{ route('user.destroy', $task->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
    @endsection