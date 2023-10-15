<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faq; // Agrega esta línea para importar el modelo Faq

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::all();
        return view('faq', compact('faqs'));
    }
}

