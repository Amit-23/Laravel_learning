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

        return view('user.usercompletedtasks', [
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

        return view('user.inprogresstasks', [
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

        return view('user.overduetasks', [
            'overdueTasks' => $overdueTasks,
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function createtask(CreateTaskRequest $request)
    {
        $user = Auth::user();


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

        return view("user.updatetask", compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateTaskRequest $request, string $id)
    {
        $task = Task::find($id);

        $validatedData = $request->validated();

        $task->name = $validatedData['name'];
        $task->status = $validatedData['status'];
        $task->task_description = $validatedData['task_description'];
        $task->duedate = $validatedData['duedate'];

        $task->save();

        return redirect()->route('userdashboard')->with('success', 'Task updated successfully');
    }


    public function adminshowuser(string $id)
    {

        $user = User::find($id);

        return view('admin.adminshowuser', compact('user'));
    }


    public function admintaskshow(string $id)
    {

        $task = Task::find($id);
        $users = User::where('role', 'user')->get();

        return view('admin.admintaskshow', [
            'task' => $task,
            'users' => $users,
        ]);
    }


    public function admindestroytask(string $id)
    {
        $user = Task::find($id);


        $user->delete();

        return redirect()->back()->with('success', 'Task Deleted successfully');
    }

    //here integrity constraint can come as i will have to update the tasks table (assigned_to,assigned_to_name) these are foreign keys here referencing users table;
    public function reassignadmintask(Request $request, $taskId)
    {

        $newAssigneeId = $request->input('new_assignee');

        $task = Task::find($taskId);

        if (!$task) {
            return redirect()->back()->withErrors(['Task not found']);
        }

        $task->assigned_to = $newAssigneeId;

        $userName = $newAssigneeId ? User::find($newAssigneeId)->name : null;

        $task->assigned_to_name = $userName;
        $task->save();
        return redirect()->back()->with('success', 'Task reassigned successfully');
    }



    public function admindestroyuser(string $id)
    {
        $user = User::find($id);


        $user->delete();

        return redirect()->back()->with('success', 'User Deleted successfully');
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
