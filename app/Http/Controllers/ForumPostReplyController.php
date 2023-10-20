<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ForumPostReply;

class ForumPostReplyController extends Controller
{
    public function store(Request $request, $postId)
    {
        // Valida los datos del formulario de respuesta
        $request->validate([
            'content' => 'required',
        ]);

        // Crea una nueva respuesta
        $reply = new ForumPostReply();
        $reply->forum_post_id = $postId;
        $reply->user_id = auth()->user()->id; // El ID del usuario autenticado
        $reply->content = $request->input('content');
        $reply->save();

        // Redirige de regreso a la publicación en el foro con un mensaje de éxito
        return redirect()->route('forum.posts.show', $postId)->with('success', 'Respuesta publicada con éxito');
    }
}

