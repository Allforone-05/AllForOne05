<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    // Define los campos que se pueden asignar de manera masiva
    protected $fillable = [
        'course_id', 'title', 'description', 'content', 'video_url', /* otros campos */
    ];

    // Define las relaciones con otros modelos, como Course, Rating, y Comment, si es necesario

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    // Otras relaciones o métodos de conveniencia pueden definirse aquí
    // En el modelo Lesson.php
public function evaluations()
{
    return $this->belongsToMany(Evaluation::class);
}

}
