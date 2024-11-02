<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\User;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
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
            return redirect()->route('admindashboard');
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