<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    function queries(){

        // $response = User::all();
        // $response = User::where('phone','123')->get();


        //inserting data
        // $response = User::insert([
        //     'name'=>'vinay',
        //     'email'=>'q@g.com',
        //     'phone'=>'555',
        // ]);


        

        $response = User::get();



        return view('user',['users'=>$response]);
    }
}
