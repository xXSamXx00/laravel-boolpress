<?php

namespace App\Http\Controllers;

use App\Mail\SendContactMail;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contacts()
    {
        return view('guest.contacts.form');
    }

    public function sendContactForm(Request $request)
    {
        $validate_data = $request->validate([
            'name' => 'required|min:5|max:50',
            'email' => 'required|email',
            'message' => 'required|min:10|max:500'
        ]);

        $contact = Contact::create($validate_data);
        // return (new SendContactMail($validate_data))->render(); // Metodo per controllare se vediamo qualcosa
        Mail::to('admin@example.com')->send(new SendContactMail($contact)); // Metodo per inviare effettivamente le mail

        return redirect()->back()->with('message', 'Messaggio inviato con successo! 😁');
    }
}
