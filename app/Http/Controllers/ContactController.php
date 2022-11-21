<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\MailContact;
use Illuminate\Support\Facades\Mail;
class ContactController extends Controller
{
    //
    public function store(Request $request){

        Mail::to('benosmanhind@gmail.com')->send(new MailContact($request));
       
        return 1;
    }
}
