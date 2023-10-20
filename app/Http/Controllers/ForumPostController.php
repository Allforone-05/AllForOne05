<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ForumPost;
class ForumPostController extends Controller
{
    public function store(Request $request) {
        // Valida los datos del formulario de creación de publicación
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
    
        // Crea una nueva publicación
        $post = new ForumPost();
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->user_id = auth()->user()->id; // Asigna el ID del usuario actual
        $post->save();
    
        return redirect()->route('forum.index')->with('success', 'Publicación creada con éxito');
    }
    
    

}
