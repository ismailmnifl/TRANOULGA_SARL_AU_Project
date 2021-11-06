<?php

namespace App\Http\Controllers;

use App\Mail\TNLSomutionsMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class mailController extends Controller
{
    public function SendMail() {
        
       $mailDetails = [
           "title" =>"test of this functionality",
           "body" =>"test of this functionality",
           
       ];
       Mail::to("tnlsolutionsorgannisation@gmail.com")->send(new TNLSomutionsMail($mailDetails));
       return "Email sent";
    }
}
