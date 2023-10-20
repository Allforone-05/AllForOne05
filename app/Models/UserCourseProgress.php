<?php

// app/Models/UserCourseProgress.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserCourseProgress extends Model
{
    protected $table = 'user_course_progress';

    protected $fillable = ['user_id', 'course_id', 'lesson_id', 'completed'];
}
