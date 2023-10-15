<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    // Nombre de la tabla en la base de datos
    protected $table = 'modules';

    // Nombre de la clave primaria de la tabla
    protected $primaryKey = 'id';

    // Campos que se pueden asignar de manera masiva
    protected $fillable = [
        'course_id',
        'titulo',
        'descripcion',
        'contenido',
        'orden',
    ];

    // Relación con el modelo Course
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    // Otras relaciones o métodos de conveniencia pueden definirse aquí
    

public function resources()
{
    return $this->hasMany(Resource::class);
}


}

