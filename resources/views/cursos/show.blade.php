 <html>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">
      <link rel="stylesheet" href="{{ asset('css/stylo.css') }}">
      <link rel="stylesheet" href="{{ asset('node_modules/bootstrap/dist/css/bootstrap.css') }}">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">


@extends('layouts.app')

@section('content')
<body>
    <div class="container miApp">
        <div class="card mb-3">
            <img src="{{ asset($course->imagen) }}" alt="{{ $course->titulo }}" class="card-img-top">
            <div class="card-body">
                <h1 class="card-title">{{ $course->titulo }}</h1>
                <p class="card-text">{{ $course->descripcion }}</p>
                <!-- Mostrar estrellas -->
                <div class="rating">
                    @for ($i = 1; $i <= 5; $i++)
                        @if ($i <= $course->stars)
                            <i class="fas fa-star text-warning"></i> <!-- Estrella llena si $i <= stars -->
                        @else
                            <i class="far fa-star"></i> <!-- Estrella vacía si $i > stars -->
                        @endif
                    @endfor
                </div>
            </div>
        </div>
    
        <section class="course-details">
            <h2>¿Qué Aprenderás?</h2>
            <ul class="list-group">
                @foreach ($course->modules as $module)
                    @foreach ($module->resources as $resource)
                        <li class="list-group-item">
                            @if ($resource->tipo === 'video')
                                <a href="{{ $resource->url }}" target="_blank" class="resource-link video-link">{{ $resource->nombre }} (Video)</a>
                            @elseif ($resource->tipo === 'pdf')
                                <a href="{{ $resource->url }}" target="_blank" class="resource-link pdf-link">{{ $resource->nombre }} (PDF)</a>
                            @else
                                {{ $resource->nombre }}
                            @endif
                        </li>
                    @endforeach
                @endforeach
            </ul>
        </section>
    
        <section class="audience">
            <h2>Audiencia Objetivo</h2>
            <p>{{  $course->audiencia_objetivo }}</p>
        </section>
    
        <section class="course-outline">
            <h2>Programa del Curso</h2>
            <ul class="list-group">
                @foreach ($course->modules as $module)
                    <li class="list-group-item">
                        <h3>{{ $module->titulo }}</h3>
                        <ul class="list-group">
                            @foreach ($module->resources as $resource)
                                <li class="list-group-item">
                                    @if ($resource->tipo === 'video')
                                        <a href="{{ $resource->url }}" target="_blank" class="resource-link video-link">{{ $resource->nombre }} (Video)</a>
                                    @elseif ($resource->tipo === 'pdf')
                                        <a href="{{ $resource->url }}" target="_blank" class="resource-link pdf-link">{{ $resource->nombre }} (PDF)</a>
                                    @else
                                        {{ $resource->nombre }}
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            </ul>
        </section>
    

<div class="container">
    
    
   <!-- Muestra los comentarios relacionados con el curso -->
   <h2>Comentarios</h2>
     @foreach ($course->forumPosts as $comment)
    <div class="comment">
        <div class="user-profile">
            @if ($comment->user->profile_photo)
                <img src="{{ asset('images/' . $comment->user->profile_photo) }}" alt="Foto de perfil" class="profile-image">
            @else
                <i class="fa fa-user user-icon"></i>
            @endif
        </div>
        <div class="comment-content">
            <p>{{ $comment->content }}</p>
            <p class="user-name">Escrito por: {{ $comment->user->name }}</p>
        </div>
    </div>
@endforeach
<style>
.comment {
    display: flex;
    margin: 10px;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    align-items: center;
}

.user-profile {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    overflow: hidden;
    margin-right: 10px;
}

.profile-image {
    width: 100%;
    height: 100%;
    object-fit: cover; /* Escalar la imagen de perfil para que sea circular */
}

.user-icon {
    font-size: 24px;
    width: 50px;
    height: 50px;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #ccc;
    border-radius: 50%;
    color: white;
}

.comment-content {
    flex: 1;
}

.user-name {
    font-weight: bold;
    margin-top: 5px;
}

</style>


</div>

<h2>Deja un Comentario</h2>
@include('comment-form')



        <section class="evaluation">
            <h2>Evaluación</h2>
            <p>Al final de cada unidad, encontrarás ejercicios de práctica y preguntas de evaluación para poner a prueba tus conocimientos adquiridos en esa unidad. Estos ejercicios te ayudarán a medir tu progreso y comprensión del material.</p>
            <a href="{{ route('cursos.clases', $course->id) }}" class="btn btn-primary">Estudiar este curso</a>
           
           
        </section>
    </div>

    
    <style>
        /* Estilo para enlaces a recursos */
        .resource-link {
            color: #007bff; /* Color azul para enlaces */
            text-decoration: none; /* Sin subrayado */
        }
    
        .resource-link:hover {
            text-decoration: underline; /* Subrayado al pasar el mouse */
        }
    
        /* Estilo para enlaces a recursos de tipo video */
        .video-link {
            color: #ff5722; /* Color naranja para videos */
        }
    
        /* Estilo para enlaces a recursos de tipo PDF */
        .pdf-link {
            color: #4caf50; /* Color verde para PDF */
        }
    
        /*
    
     Estilo para secciones */
        section {
            margin-bottom: 20px;
        }
    </style>
    
</body>
</html>

@endsection

