<?php

namespace App\Http\Controllers;

use App\Mail\MessageReceived;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Validator;

class MessageController extends Controller
{
    public function store(Request $request){

     $message= request()->validate([
            'fullname' => 'required',
            'email'=> 'required|email',
            'subject' => 'required',
            'content' => 'required|min:15'
         /*'subject' => ['required'],
            'content' => ['require','min:15']*/
       ],[
            'name.required' => __('I need your name')
       ]);
        Mail::to('ceron.guzman.alejandro@gmail.com')->queue(new MessageReceived($message));
        //return new MessageReceived($message);


       return back()->with('status', 'Recibimos tu mensaje, te responderemos en menos de 24 horas.');
    }
}
