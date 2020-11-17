<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class EmailController extends Controller
{

    public function send(Request $request)
    {
        $data = array(
            'name' => $request->name,
            'email'=> $request->email,
            'subject' => $request->subject,
            'message' => $request->message
        );

        Mail::to('stefan.saric.exe4u@gmail.com')->send(new SendMail($data));
        return back()->with('success', 'Thanks for contacting us!');
    }

}

