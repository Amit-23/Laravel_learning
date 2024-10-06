<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function addUser(UserRequest $request){
        


        return $request->all();
    }
}
