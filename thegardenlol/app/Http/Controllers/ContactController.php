<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        // Send email
        Mail::send('emails.contact', [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ], function($mail) use($request) {
            $mail->from($request->email, $request->name);
            $mail->to('contact@valentin-marot.fr')->subject('Contact Request');
        });
        
        return back()->with('success', 'Thanks for contacting us!');
    }
}
