<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'titulo', 'descripcion', 'nivel', 'duracion', 'instructor'
    ];

    // Define la relación uno a muchos con los módulos
    public function modules()
    {
        return $this->hasMany(Module::class);
    }

    // app/Models/Course.php

public function resources()
{
    return $this->hasMany(Resource::class);
}

// En el modelo Course
public function comments()
{
    return $this->hasMany(Comment::class);
}

}
