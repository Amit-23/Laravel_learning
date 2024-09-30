<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    function upload(Request $request){
        // echo "working";

        // $path=$request->file('file')->store('public'); will have default name


        $path=$request->file('file')->storeAs('public','amitPhoto.jpg');


        $fileNameArray = explode("/",$path);
        //explode("/",$path) will split the string into an array based on a delimiter, here in this case it is "/";
        $fileName=$fileNameArray[1];
        return view('display',['path'=>$fileName]);
    }
}
