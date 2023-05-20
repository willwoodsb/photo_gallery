<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store() {
        $attributes = request()->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'email|required',
            'subject' => 'required',
            'message' => 'required'
        ]);

        Mail::to('willwoodsb@gmail.com')
            ->send(new Contact($attributes));
        
        return redirect('/#contact-form')
            ->with('success', 'Message sent successfully');
    }
}
