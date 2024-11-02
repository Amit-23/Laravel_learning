<ul>
                @foreach($inprogressTasks as $task)
                    <li>
                        <h2>{{ $task->name }}</h2>
                        <p><strong>Status:</strong> {{ $task->status }}</p>
                        <p><strong>Description:</strong> {{ $task->task_description }}</p>
                        <p><strong>Created At:</strong> {{ $task->created_at }}</p>
                        <p><strong>Due Date:</strong> {{ $task->duedate ?? 'Not set' }}</p>
                        <p><strong>Created By:</strong> {{ $task->created_by }}</p>
                        <p><strong>Assigned To:</strong> {{ $task->assigned_to }}</p>
                    </li>
                @endforeach
            </ul>