<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    public function index()
{
    $courses = Course::with('modules')->get();
    
    return view('informacion.index', compact('courses'));

}

}
