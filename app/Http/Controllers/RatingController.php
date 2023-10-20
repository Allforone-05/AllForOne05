<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;
use App\Models\Lesson;

class RatingController extends Controller
{
    public function store(Request $request, $lessonId) {
        // Valida los datos del formulario de calificaciones
        $request->validate([
            'value' => 'required|integer|min:1|max:5',
        ]);

        // Encuentra la lección
        $lesson = Lesson::find($lessonId);
        $lesson = Lesson::with('ratings')->find($lessonId);

        if (!$lesson) {
            abort(404, 'Lección no encontrada');
        }

        // Verifica si el usuario ya ha calificado esta lección
        $user = auth()->user();
        $existingRating = Rating::where('user_id', $user->id)->where('lesson_id', $lessonId)->first();

        if ($existingRating) {
            // Si el usuario ya calificó la lección, actualiza la calificación
            $existingRating->value = $request->input('value');
            $existingRating->save();
        } else {
            // Si el usuario no ha calificado la lección, crea una nueva calificación
            $rating = new Rating();
            $rating->user_id = $user->id;
            $rating->lesson_id = $lessonId;
            $rating->value = $request->input('value');
            $rating->save();
        }

        // Redirige de regreso a la lección con un mensaje de éxito
        return redirect()->route('lessons.show', $lessonId)->with('success', 'Calificación guardada con éxito');
        return redirect()->route('cursos.clases', $lessonId)->with('success', 'Calificación guardada con éxito');
    }
}
