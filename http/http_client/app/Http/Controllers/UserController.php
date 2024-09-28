<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    function getData(){
        $response = Http::get('https://fakestoreapi.com/products/1');
        $response = $response->body();
        return view('user',['data'=>json_decode($response)]);
    }
}
