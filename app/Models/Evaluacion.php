<?php

// app/Evaluacion.php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluacion extends Model
{
    protected $fillable = ['pregunta', 'opciones', 'respuestas'];

    // Relación uno a muchos con resultados (si necesitas almacenar los resultados)
    public function resultados()
    {
        return $this->hasMany(Resultado::class);
    }
}

