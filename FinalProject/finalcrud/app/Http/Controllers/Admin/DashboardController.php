<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Psy\Command\EditCommand;

class DashboardController extends Controller
{
    public function index(){
        return view('admin.dashboard');
    }

    public function user(){
        return view('user.dashboard');
    }


    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
