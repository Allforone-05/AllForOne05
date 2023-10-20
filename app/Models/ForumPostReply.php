<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForumPostReply extends Model
{
    use HasFactory;
    // app/Models/ForumPostReply.php

public function user() {
    return $this->belongsTo(User::class);
}

public function post() {
    return $this->belongsTo(ForumPost::class);
}
}
