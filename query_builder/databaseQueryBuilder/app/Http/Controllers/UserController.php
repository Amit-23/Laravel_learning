<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    function queries(){ 
        // $result = DB::table('users')->get(); getting the data from the table users


        //$result = DB::table('users')->where('phone','231')->get(); getting the data from the table where phone = 231



        //inserting the data to the table;
        // $result = DB::table('users')->insert([
        //     'name'=>'Ajay',
        //     'email'=>'ajay@g.com',
        //     'phone'=>'990',
        // ]);
        // if($result){
        //     return "Data inserted";
        // }else{
        //     return "Data not inserted";
        // }


        //updating the data in the table
       // $result = DB::table('users')->where('name','Ajay')->update(['phone'=>100000]);


       
        //deleting the data from the table
        //$result = DB::table('users')->where('name','Ajay')->delete();




        //return view('users',['users'=>$result]);
    }
}
