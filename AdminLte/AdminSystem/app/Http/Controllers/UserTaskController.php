<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Task;
use App\Http\Requests\CreateTaskRequest;


class UserTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }



    public function showCompletedTasks()
    {
        $user = Auth::user();

        // Retrieve all tasks created by or assigned to the user
        $createdTasks = $user->createdTasks;
        $assignedTasks = $user->assignedTasks;
        $allTasks = $createdTasks->merge($assignedTasks);


        $completedTasks = $allTasks->where('status', 'completed');

        return view ('user.usercompletedtasks',[
            'completedTasks' => $completedTasks,
        ]);
    }


    public function showInprogressTasks()
    {
        $user = Auth::user();

        // Retrieve all tasks created by or assigned to the user
        $createdTasks = $user->createdTasks;
        $assignedTasks = $user->assignedTasks;
        $allTasks = $createdTasks->merge($assignedTasks);


        $inProgressTasks = $allTasks->where('status', 'inprogress');

        return view ('user.inprogresstasks',[
            'inprogressTasks' => $inProgressTasks,
        ]);
    }

    public function showOverdueTasks()
    {
        $user = Auth::user();

        // Retrieve all tasks created by or assigned to the user
        $createdTasks = $user->createdTasks;
        $assignedTasks = $user->assignedTasks;
        $allTasks = $createdTasks->merge($assignedTasks);


        $overdueTasks = $allTasks->where('status', 'overdue');

        return view ('user.overduetasks',[
            'overdueTasks' => $overdueTasks,
        ]);
    }



    /**
     * Show the form for creating a new resource.
     */
    public function createtask(CreateTaskRequest $request)
    {
      

        $user = Auth::user();

        // dd($user->name);


       Task::create([
        'name' => $request->name,
        'status' => $request->status,
        'task_description' => $request->task_description,
        'duedate' => $request->duedate,
        'created_by' => $user->id,
        'assigned_to' => $user->id,
        'created_by_name' => $user->name,
        'assigned_to_name' => $user->name,

       ]);
       return redirect()->back()->with('success', 'Task added successfully!');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $task = Task::find($id);

        return view("user.viewtask", compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $task = Task::find($id);

        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::find($id);
        $task->delete();
        return redirect()->back()->with('success', 'Task Deleted successfully!');

        
    }
}
