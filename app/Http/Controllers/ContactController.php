<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    public function show()
    {
        return view('contact');
    }

    public function send(Request $request)
    {
        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'subject' => $request->input('subject'),
            'message' => $request->input('message'),
        ];

        // Envía el correo electrónico
        Mail::to('correo@tudominio.com')->send(new ContactMail($data));

        // Redirige de nuevo a la vista de contacto y muestra un mensaje de éxito
        return redirect()->route('contact.show')->with('message', '¡Tu mensaje ha sido enviado! Te responderemos pronto.');
    }
}
