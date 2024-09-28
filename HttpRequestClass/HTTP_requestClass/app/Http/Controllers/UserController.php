<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    function login(Request $request){

        echo "Request method is ". $request->method();
        echo "<br>";
        echo "Request path is ". $request->path();
        echo "<br>";
        echo "URL is ". $request->url();
        echo "<br>";
        echo "Input field name is  ". $request->input('email');
        echo "<br>";
        echo "Input field password is  ". $request->input('password');
        echo "<br>";
        echo "Your ip address is  ". $request->ip();
    }
}
