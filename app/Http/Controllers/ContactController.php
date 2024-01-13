<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Mail\ContactFormMail; // Include the Mailable class
use Illuminate\Support\Facades\Mail;


class ContactController extends Controller
{
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'sometimes|nullable',
            'subject' => 'sometimes|nullable',
            'message' => 'required',
        ]);

        // Store the data in the database
        $contact = Contact::create($validated);

        // Send an email using the data
        Mail::to('ghada@example.com')->send(new ContactFormMail($contact));

        // Redirect back with a success message
        return back()->with('success', 'Your message has been sent successfully!');
    }
}
