<?php
// app/Http/Controllers/ForoController.php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Mensaje;
use App\Models\Megusta;
use Illuminate\Support\Facades\Auth;

class ForoController extends Controller
{
    public function index()
    {
        $mensajes = Mensaje::with('meGusta')->orderBy('created_at', 'desc')->get();
        return view('foro.index', ['mensajes' => $mensajes]);
    }

    public function publicar(Request $request)
    {
        $this->validate($request, [
            'contenido' => 'required|max:255',
        ]);

        $mensaje = new Mensaje;
        $mensaje->contenido = $request->input('contenido');
        $mensaje->user_id = Auth::user()->id;
        $mensaje->save();

        return redirect()->route('foro.index');
    }

    public function megusta($id)
    {
        $mensaje = Mensaje::find($id);

        if (!$mensaje) {
            return redirect()->route('foro.index')->with('error', 'Mensaje no encontrado.');
        }

        $megusta = new Megusta;
        $megusta->mensaje_id = $mensaje->id;
        $megusta->user_id = Auth::user()->id;
        $megusta->save();

        return redirect()->route('foro.index');
    }

    public function responder(Request $request, $id)
{
    $this->validate($request, [
        'respuesta' => 'required|max:255',
    ]);

    $mensajePadre = Mensaje::find($id);

    if (!$mensajePadre) {
        return redirect()->route('foro.index')->with('error', 'Mensaje no encontrado.');
    }

    $mensaje = new Mensaje;
    $mensaje->contenido = $request->input('respuesta');
    $mensaje->user_id = Auth::user()->id;
    $mensaje->padre_id = $mensajePadre->id; // Establece el mensaje padre
    $mensaje->save();

    return redirect()->route('foro.index');
}

}
