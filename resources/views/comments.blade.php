

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Comentarios</h2>
        <!-- Mostrar lista de comentarios aquí -->
        <ul>
            @foreach($comments as $comment)
                @include('comments.comment', ['comment' => $comment])
            @endforeach
        </ul>

        @auth
            <form method="POST" action="{{ route('comments.store') }}">
                @csrf
                <input type="hidden" name="course_id" value="{{ $course->id }}">
                <textarea name="content" placeholder="Añade un comentario" rows="4"></textarea>
                <button type="submit">Comentar</button>
            </form>
        @else
            <p>Inicia sesión para agregar un comentario.</p>
        @endauth
    </div>
@endsection
