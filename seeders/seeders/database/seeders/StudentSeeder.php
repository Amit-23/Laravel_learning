<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\student;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        for($i=1;$i<20;$i++){
            
         student::create([
             'name'=>fake()->name(),
             'email'=>fake()->unique()->email()
            ]);

        }



        // $json = File::get(path:'database/json/students.json');

        // $students = collect(json_decode($json));

        // $students->each(function($student){
        //     student::create([
        //      'name'=>$student->name,
        //      'email'=>$student->email
        //     ]);
        // });


        // $students = collect(
        //     [ [
        //      'name'=>'Gopal',
        //      'email'=>'a@gmail.com'
        // ],
        // [
        //      'name'=>'Hul',
        //      'email'=>'t@gmail.com'
        // ],
        // [
        //      'name'=>'Aahul',
        //      'email'=>'atr@gmail.com'
        // ]
        // ]

        // );

        // $students->each(function($student){
        //     student::insert($student);

        // });

        // student::create([
        //     'name'=>'Dev',
        //     'email'=>'dev@gmail.com'
        // ]);
    }
}
