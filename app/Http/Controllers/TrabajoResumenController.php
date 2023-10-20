<?php

// app/Http/Controllers/TrabajoResumenController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\TrabajoResumen;

class TrabajoResumenController extends Controller
{
    public function index()
    {
        $trabajosResumenes = TrabajoResumen::all();
        return view('trabajos_resumenes.index', compact('trabajosResumenes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'archivo' => 'required|mimes:pdf',
        ]);

        // Sube el archivo y obtén la ruta del archivo en el sistema de archivos
        $archivoPath = $request->file('archivo')->store('trabajos_resumenes');

        // Crea un nuevo registro de TrabajoResumen
        $trabajoResumen = new TrabajoResumen;
        $trabajoResumen->titulo = $request->input('titulo');
        $trabajoResumen->archivo_path = $archivoPath;
        $trabajoResumen->save();

        return redirect()->route('trabajos_resumenes.index')->with('success', 'Trabajo o resumen cargado con éxito');
    }

    public function show(TrabajoResumen $trabajoResumen)
    {
        return view('trabajos_resumenes.show', compact('trabajoResumen'));
    }

    // Otros métodos según tus necesidades
}
