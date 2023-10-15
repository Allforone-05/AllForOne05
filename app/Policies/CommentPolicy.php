

<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Comment;

class CommentPolicy
{
    public function delete(User $user, Comment $comment)
    {
        // Define la lógica para determinar si un usuario puede eliminar un comentario.
        // Por ejemplo, si el usuario es el propietario del comentario o un administrador.
        return $user->id === $comment->user_id || $user->isAdmin();
    }
}
