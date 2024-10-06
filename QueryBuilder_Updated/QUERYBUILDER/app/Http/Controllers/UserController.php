<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class UserController extends Controller
{

    public function showUsers()
    {
        //$users = DB::table('users')->orderBy('age')->simplePaginate(4);

        $users = DB::table('users')->paginate(3);



        //dump($users);
        //dd($users);

        return view('allusers', ['data' => $users]);
    }

    public function singleUser($id)
    {
        $users = DB::table('users')->where('id', $id)->get();
        return view('user', ['data' => $users]);
    }


    
    public function addUser(Request $request)
    {
        $user = DB::table('users')
            ->insert([
                'name' => $request->username,
                'email' => $request->useremail,
                'age' => $request->userage,
                'city' => $request->usercity,
                // 'created_at' => now(),
                // 'updated_at' => now()
            ]);

        if ($user) {
            echo "<h1>Data Successfully Added.</h1>";

            return redirect()->route('list');
        } else {
            echo "<h1>Data could not be inserted!</h1>";
        }
    }


    public function updatePage($id)
    {
        //$user = DB::table('users')->where('id', $id)->get(); //will return array of object (json format);


        $user = DB::table('users')->find($id); //will return simple array

        return view('updateuser', ['data' => $user]);
    }



    public function updateUser(Request $request, $id)
    {

        
        $user = DB::table('users')
            ->where('id', $id)
            ->update([
                'name' => $request->username,
                'email' => $request->useremail,
                'age' => $request->userage,
                'city' => $request->usercity,
            ]);

            if($user){
                return redirect()->route('list');
            }

            else{
                echo "<h1>Data not updated!</h1>";
            }
    }





    public function deleteUser($id)
    {
        $user = DB::table('users')
            ->where('id', $id)
            ->delete();

        if ($user) {
            return redirect()->route('list');
        } else {
            echo "Could not delete";
        }
    }
}
