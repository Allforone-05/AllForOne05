<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tema extends Model
{
    // Nombre de la tabla en la base de datos (si es diferente al nombre de la clase en plural)
    protected $table = 'temas';

    // Campos que se pueden asignar de manera masiva
    protected $fillable = ['titulo', 'descripcion'];

    // Definir relaciones u otros métodos aquí
}
