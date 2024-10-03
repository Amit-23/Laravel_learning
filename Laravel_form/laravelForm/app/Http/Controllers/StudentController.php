<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    function add(Request $request)
    {
        $student = new Student();
        $student->name = $request->input('name');
        $student->email = $request->input('email');
        $student->phone = $request->input('phone');
        $result = $student->save();
        if ($result) {
            return redirect('list');
        }
    }


    function list()
    {

        // $studentData = Student::all();
        $studentData = Student::paginate(3);
        return view('list-student', ['students' => $studentData]);
    }

    function delete($id)
    {
        $isDeleted = Student::destroy($id);

        if ($isDeleted) {
            return redirect('list');
        }
    }

    function edit($id)
    {

        $student = Student::find($id);
        return view('edit', ['data' => $student]);
    }

    function editStudent(Request $request, $id)
    {
        $student = Student::find($id);
        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        if ($student->save()) {
            return redirect('list');
        } else {
            return "Updation failed";
        }
    }


    function search(Request $request)
{
    $searchTerm = $request->input('search');
    
    // Use paginate instead of get to enable pagination and links()
    $studentData = Student::where('name', 'like', "%{$searchTerm}%")->paginate(3);
    
    return view('list-student', ['students' => $studentData, 'search' => $searchTerm]);
}



//     function search(Request $request)
// {
//     $searchTerm = $request->input('search');
//     $studentData = Student::where('name', 'like', "%{$searchTerm}%")->get();
//     return view('list-student', ['students' => $studentData, 'search' => $searchTerm]);
// }


    // function search(Request $request)
    // {

    //     $studentData = Student::where('name', 'like', "%$request->search%")->get();

    //     return view('list-student', ['students' => $studentData, 'search' => $request->search]);
    //     // return $studentData;
    // }


}
