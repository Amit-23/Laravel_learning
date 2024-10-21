<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Task;

class LoginController extends Controller
{
    public function showLoginPage(){
        return view('admin.auth.login');
    }

    public function login(Request $request){

        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {

            // Retrieve the authenticated user
            $user = Auth::user();

            // Store user's name, email, and password in the session
            Session::put('requestData', [
                'id' => $user->id,
                'name' => $user->name, // Store the name from the authenticated user
                'email' => $request->email,
                'password' => $request->password,
            ]);

            $tasks = Task::where('assigned_to',$user->id)
            ->where('created_by',$user->id)
            ->get();

            Session::put('tasks',$tasks);

            if ($user->role == 'admin') {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('user.dashboard');
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records'
        ]);
    }
}
