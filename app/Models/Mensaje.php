<?php

// app/Models/Mensaje.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    // En tu modelo Mensaje.php
public function user()
{
    return $this->belongsTo(User::class);
}


    public function meGusta()
    {
        return $this->hasMany(Megusta::class);
    }
}
