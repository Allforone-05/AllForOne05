<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForumPost extends Model
{
    use HasFactory;
    // app/Models/ForumPost.php

public function user() {
    return $this->belongsTo(User::class);
}
// En el modelo ForumPost (app/Models/ForumPost.php)

public function course()
{
    return $this->belongsTo(Course::class);
}


}
