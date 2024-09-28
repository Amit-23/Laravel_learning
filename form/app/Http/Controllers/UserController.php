<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    function addUser(Request $request){
        //request object represents the incoming HTTP request, contains all the information about the request;


        $request->validate([
            'email'=>'required|email|min:11|max:40',
            'passwd'=>'required|min:6'
        ],[
            'email.required'=>'*Email field is required!',
            'email.min'=>'*Email field should be atleast 11 character long!!',
            'email.max'=>'*Email field cannot be more than 50 character long!!',
            'passwd.required'=>'*Password field cannot be empty!',
            'passwd.min'=>'*Password should contain atleast 6 characters!!',

        ]);
         return $request->all();
    }
}
