<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile()
{
    return view('perfil'); // Cambia 'perfil' al nombre de tu vista de perfil
}

}
