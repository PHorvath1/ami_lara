<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\facades\Mail;
use App\Mail\SignUp;

class MailController extends Controller
{
    public function sendMail()
    {
        $name='bob';
        mail::to('fake@mail.com')->send(new SignUp($name));
        return view('welcome'); 


    }
}
