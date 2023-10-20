<?php

namespace App\Http\Controllers;

// app/Http/Controllers/EvaluacionController.php

use Illuminate\Http\Request;
use App\Models\Evaluation;
use App\Models\Evaluacion;
class EvaluacionController extends Controller
{

    public function index()
    {
        // Obtener todas las evaluaciones desde el modelo Evaluacion
      
        $evaluaciones = Evaluation::all();
        // Pasar las evaluaciones a una vista y renderizarla
        return view('evaluaciones.index', compact('evaluaciones'));
        return view('evaluations.index', compact('evaluaciones'));
    }

    public function store(Request $request)
    {
        // Valida las respuestas del formulario
        $request->validate([
            'respuesta_1' => 'required', // Valida que la respuesta 1 esté presente
            'respuesta_2' => 'required', // Valida que la respuesta 2 esté presente
            // Agrega más reglas de validación según tus necesidades
        ]);

        // Realiza cualquier lógica de procesamiento de puntuación aquí
        $puntuacion = $this->calcularPuntuacion($request->all());

        // Puedes guardar la puntuación en la base de datos si es necesario
        // Ejemplo: $resultado = Resultado::create(['puntuacion' => $puntuacion]);

        // Redirige a una vista de resultados o agradecimiento
        return view('evaluaciones.resultado', compact('puntuacion'));
    }

    private function calcularPuntuacion($respuestas)
    {
        // Lógica para calcular la puntuación según las respuestas
        // Ejemplo: suma o resta puntos según las respuestas
        return 100; // Puntuación de ejemplo
    }

    public function show(Evaluation $evaluation)
{
    return view('evaluations.show', compact('evaluation'));
}

}

