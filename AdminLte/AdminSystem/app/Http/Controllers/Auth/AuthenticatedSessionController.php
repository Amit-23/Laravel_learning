<?php
namespace App\Http\Controllers\Auth;
use App\Mail\TaskAssignedMail;
use Illuminate\Support\Facades\Mail;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Task;
use App\Http\Requests\CreateTaskRequest;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }





  public function admindata() {
    // Count users where the role is 'user' to get total number of users
    $totalUsers = User::where('role', 'user')->count();

    $totalTasks = Task::where('created_by_name','amit_admin')->count();

    return view('admin.adminhomepage', [
        'totalUsers' => $totalUsers,
        'totalTasks' => $totalTasks,
    ]);
}



//here job scheduling concept can be used as the email takes time to send, this email sending task can be added to the queue in the background;
public function adminCreateTask(CreateTaskRequest $request)
{
    $user = Auth::user();
    $client = User::find($request->assigned_to_name);
    $clientName = $client ? $client->name : null;

    $task = Task::create([
        'name' => $request->name,
        'status' => $request->status,
        'task_description' => $request->task_description,
        'duedate' => $request->duedate,
        'created_by' => $user->id,
        'created_by_name' => $user->name,
        'assigned_to' => $request->assigned_to_name,
        'assigned_to_name' => $clientName, 
    ]);

    // Check if client is not null and queue the email
    if ($client) {
        $clientEmail = $client->email;

        // Queue the email with task details
        Mail::to($clientEmail)->queue(new TaskAssignedMail($task));
    }

    return redirect()->back()->with('success', 'Task created successfully!');
}




public function admintasks(){

    $totalTasks = Task::where('created_by_name','amit_admin')->get();
    $userslist = User::where('role','user')->get();
     

    
    return view('admin.admintasks',[
        'totalTasks' => $totalTasks,
        'userslist' => $userslist,
        
    ]);

}


public function listUsers(){

    $users = User::where('role','user')->get();

    return view('admin.listusers',compact('users'));
}



  public function tasksdata(){
     $user = Auth::user();
    // Retrieve all tasks created by or assigned to the user
    $createdTasks = $user->createdTasks;
    $assignedTasks = $user->assignedTasks;
    $allTasks = $createdTasks->merge($assignedTasks);


    $completedCount = $allTasks->where('status','completed')->count();
    $inProgressCount = $allTasks->where('status','inprogress')->count();
    $overdueCount = $allTasks->where('status','overdue')->count();

    
    return view('user.userhomepage',[
        'completedCount' => $completedCount,
        'inProgressCount' => $inProgressCount,
        'overdueCount' => $overdueCount,
    ]);
  }


    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $user = User::where('email', $request->input('email'))->sole();

        $role = $user->role;
         

         $request->session()->regenerate(); 
        $request->authenticate();

        $request->session()->regenerate();

        if ($role == 'admin') {
            return redirect()->route('adminhomepage');
        }

        else{
             return redirect()->intended(route('userhome', absolute: false));
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}