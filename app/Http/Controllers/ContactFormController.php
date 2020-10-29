<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class ContactFormController extends Controller
{
    public function create()
    {
        return view ('contact.create');
    }

    public function store()
    {
        $data=request()->validate([
            'name'=>'required | min: 3',
            'email'=>'required | email',
            'phone_number'=>'required | numeric',
            'message'=>'required'
        ]);
        
        Mail::to('test@test.com')->send(new ContactFormMail($data));

        return redirect('contact')->with('success_message_send','Thanks for your message. We\'ll be in touch');
    }
}
