<?php

namespace App\Http\Controllers;
use App\Models\Image;

use Illuminate\Http\Request;

class ImageController extends Controller
{

    function upload(Request $request){
        $path=$request->file('file')->store('public');
        $pathArray=explode("/",$path);
        $imgPath=$pathArray[1];
        $img=new Image();
        $img->path=$imgPath;
        if($img->save()){
            return redirect('display');
        }

    }

    function display(){
        $images=Image::all();
        return view('display',['imgData'=>$images]);
    }
}
