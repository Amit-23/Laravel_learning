<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Mail\AdminNotificationMail;
use Illuminate\Support\Facades\Session;

class ContactController extends Controller
{
    public function register(){
        return view('admin.contact');
    }

    public function create(Request $request){
        // Validation with custom error messages
        $validateUser = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required',
            ],
            // Custom error messages
            [
                'name.required' => 'Name cannot be empty',
                'email.required' => 'Email is required',
                'email.email' => 'Please provide a valid email address',
                'email.unique' => 'A user with this email already exists',
                'password.required' => 'Password cannot be empty',
            ]
        );

        // If validation fails, return back with specific error messages
        if($validateUser->fails()){
            return back()->withErrors($validateUser)->withInput();
        }

        // Else, proceed with creating the user or other logic

      
        
        $user = User::create([

            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,

        ]);

      

        $adminEmail = 'amitsanghalsingh@gmail.com';

        Mail::to($adminEmail)->send(new AdminNotificationMail($user));

        return redirect()->route('admin.login')->with('success', 'User registered successfully!');


        
    }
}
