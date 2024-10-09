<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $users = User::simplepaginate(1);

       //$users = User::find(2,['name','email']);
       //$users = User::count();

       //$users = User::min('age');
     //  $users = User::sum('age');

     //$users = User::where('city','jammu')
       // ->orwhere('age','>',20)->get();

       //return $users;

        return view('home',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('adduser');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        

        $request->validate([
            'username' => 'required|string',
            'useremail' => 'required|email|unique:users,email',
            'userage' => 'required|numeric',
            'usercity' => 'required|alpha',


        ]);
         $user = new User;

         $user->name = $request->username;
         $user->email = $request->useremail;
         $user->age = $request->userage;
         $user->city = $request->usercity;

         $user->save();

         return redirect()->route('user.index')->with('status','New User Added Successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $users = User::find($id);
       
        return view("viewuser",compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)

  
    {
          
       $users = User::find($id);
       

       return view("updateuser",compact('users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {  


        $request->validate([
            'username' => 'required|string',
            'useremail' => 'required|email|unique:users,email',
            'userage' => 'required|numeric',
            'usercity' => 'required|alpha',


        ]);


        $user = User::find($id);

        $user->name = $request->username;
        $user->email = $request->useremail;
        $user->age = $request->userage;
        $user->city = $request->usercity;

        $user->save();

          return redirect()->route('user.index')->with('status','User Updated Successfully.');



        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $users = User::find($id);

        $users->delete();

        
         return redirect()->route('user.index')->with('status','User Deleted Successfully');
    }
}
