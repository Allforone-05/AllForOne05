<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Lesson;

class CommentController extends Controller
{
    public function store(Request $request, $lessonId) {
        // Valida los datos del formulario de comentarios
        $request->validate([
            'content' => 'required|string',
        ]);

        // Encuentra la lección
        $lesson = Lesson::find($lessonId);

        if (!$lesson) {
            abort(404, 'Lección no encontrada');
        }

        // Crea un nuevo comentario
        $comment = new Comment();
        $comment->user_id = auth()->user()->id;
        $comment->lesson_id = $lessonId;
        $comment->content = $request->input('content');
        $comment->save();

        // Redirige de regreso a la lección con un mensaje de éxito
        return redirect()->route('lessons.show', $lessonId)->with('success', 'Comentario publicado con éxito');
        return redirect()->route('cursos.clases', $lessonId)->with('success', 'Comentario publicado con éxito');
    }
}
