<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    function show(){
        return "Student list";
    }

    function add(){
        return "Add new student";
    }

    function get(){
        return "get student";
    }

    function set(){
        return "set student";
    }
    function about($name){
        return view('about',['name'=>$name]);
    }
}
