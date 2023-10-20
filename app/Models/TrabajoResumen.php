<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// app/Models/TrabajoResumen.php

use Illuminate\Database\Eloquent\Model;

class TrabajoResumen extends Model
{
    protected $fillable = ['titulo', 'descripcion', 'archivo_path'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

