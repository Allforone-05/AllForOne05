

<li>
    <p>{{ $comment->content }}</p>
    <!-- Mostrar información del usuario que hizo el comentario -->
    <p>Por: {{ $comment->user->name }}</p>
    
    <!-- Agregar un formulario para responder a este comentario -->
    @auth
        <form method="POST" action="{{ route('comments.store') }}">
            @csrf
            <input type="hidden" name="course_id" value="{{ $course->id }}">
            <input type="hidden" name="parent_id" value="{{ $comment->id }}">
            <textarea name="content" placeholder="Responder a este comentario" rows="3"></textarea>
            <button type="submit">Responder</button>
        </form>
    @endauth

    <!-- Mostrar respuestas a este comentario -->
    <ul>
        @foreach($comment->replies as $reply)
            @include('comments.comment', ['comment' => $reply])
        @endforeach
    </ul>
</li>
