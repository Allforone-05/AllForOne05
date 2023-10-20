<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserCourseProgress;
use App\Models\Lesson;

class UserCourseProgressController extends Controller
{
    public function completeLesson(Request $request, $lessonId) {
        $lesson = Lesson::find($lessonId);

        if (!$lesson) {
            abort(404, 'Lección no encontrada');
        }

        $user = auth()->user();
        $userProgress = UserCourseProgress::firstOrNew([
            'user_id' => $user->id,
            'course_id' => $lesson->course_id,
            'lesson_id' => $lessonId,
        ]);

        $userProgress->completed = true;
        $userProgress->save();

        // Realiza otras acciones según tus necesidades, como redirigir al usuario
    }
}
