<?php

namespace App\Http\Controllers;

use App\Mail\welcomeemail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
     public function sendEmail(){

        $toEmail = "amitsanghalsingh@gmail.com";
        $message = "Hello from laravel";
        $subject = "Welcome to the laravel";

        $details = [
            'name' => "Amit",
            'product' => "Dev",
            'price' => 300
        ];

       $request =  Mail::to($toEmail)->send(new welcomeemail($message,$subject,$details));

       dd($request);
     }


     public function contactForm(){
        return view('contact-form');
     }

     public function sendContactEmail(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required|min:5|max:100',
            'message' => 'required|min:10|max:255',
            'attachment' => 'required|mimes:pdf,doc,docx,xls,xlsx|max:2048',

        ]);

        $fileName = time(). "." .$request->file('attachment')->extension();

        $request->file('attachment')->move('uploads',$fileName);

        $adminEmail = "amitsanghalsingh@gmail.com";

        $response =  Mail::to($adminEmail)->send(new welcomeemail($request->all(),$fileName));

        if($response){
            return back()->with('success',"Thanks for contacting us.");
        } else{
            return back()->with('error',"Unable to submit the form, Please try again");
        }



        dd($fileName);

     }
}
