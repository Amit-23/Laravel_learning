<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    function get(){
        return 'get method';
    }

    function post(Request $request){
        return 'POST METHOD';
    }

    function put(){
        return 'put method';
    }

    function any(){
        return 'anyfunction';
    }
    function handle(){
        return 'handle';
    }
}
