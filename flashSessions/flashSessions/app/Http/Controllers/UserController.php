<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    function addUser(Request $request){

        $request->session()->flash('message','User has been created successfully');


        return redirect('user');
    }
}
