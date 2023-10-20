
  

<html>
    <head>
       
       
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">


       
        @extends('layouts.app')
        @section('content')
<!-- Contenido de la vista show.blade.php -->

<!-- Resto del contenido del artículo -->
<div class="container miApp ">
    <br>
    <br>
    <br>
    <br>
    <div class="container col-8 justify-content-lg-start"><img src="{{ asset($article->imagen) }}" alt="{{ $article->title }}" class="featured-image ">
    </div>
    <!-- Imagen destacada -->
    

    <!-- Título del artículo -->
    <h2>{{ $article->title }}</h2>
    <h5 class="card-title">{{ $article->description }}</h5>
    <!-- Fecha de publicación -->
    <p class="published-date">{{ $article->created_at->format('d/m/Y') }}</p>

    <!-- Contenido del artículo -->
    <div class="article-content">
        @foreach (explode("\n", $article->content) as $paragraph)
            <p>{{ $paragraph }}</p>
        @endforeach
    </div>

    <!-- Botón para abrir el modal con cursos relacionados -->
    <button type="button" class="related-courses-button" data-toggle="modal" data-target="#relatedCoursesModal">
        Cursos Relacionados
    </button>
</div>

<!-- Modal de Cursos Relacionados -->
<div class="modal fade" id="relatedCoursesModal" tabindex="-1" role="dialog" aria-labelledby="relatedCoursesModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="relatedCoursesModalLabel">Cursos Relacionados</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Itera a través de los cursos relacionados y muéstralos -->
                @foreach ($relatedCourses as $course)
                <div class="related-course">
                    <img src="{{ asset($course->imagen) }}" class="featured-image" alt="{{ $course->titulo }}">
                    <h4>{{ $course->titulo }}</h4>
                    <p>{{ $course->descripcion }}</p>
                    <p class="published-date">Nivel: {{ $course->nivel }}</p>
                    <!-- Agrega cualquier otro detalle que desees mostrar -->
                </div>
                @endforeach

                @auth
                <a href="{{ route('cursos.show', $course->id) }}" class="btn btn-success curso-link" data-curso-id="{{ $course->id }}">
                    Acceder al curso
                </a>
                @else
                <p>Debes <a href="{{ route('register') }}" class=" text-decoration-none curso-link">registrarte</a> para acceder al curso.</p>
                @endauth
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<br/><br/>

<style>
    /* Estilo para el contenedor principal */
    .container {
        margin-top: 20px;
    }

    /* Estilo para la imagen destacada */
    .featured-image {
        max-width: 100%;
        height: auto;
        margin-bottom: 20px;
    }

    /* Estilo para la fecha de publicación */
    .published-date {
        font-size: 14px;
        color: #888;
    }

    /* Estilo para el contenido del artículo */
    .article-content {
        font-size: 16px;
        line-height: 1.5;
        margin-bottom: 20px;
    }

    /* Estilo para los títulos de sección */
    .section-title {
        font-size: 24px;
        font-weight: bold;
        margin-top: 20px;
    }

    /* Estilo para las listas */
    ul {
        list-style-type: disc;
        margin-left: 20px;
    }

    /* Estilo para el botón de cursos relacionados */
    .related-courses-button {
        background-color: #007BFF;
        color: #fff;
        border: none;
        padding: 10px 20px;
        margin-top: 20px;
        cursor: pointer;
    }

    /* Estilo para el modal de cursos relacionados */
    .modal-content {
        padding: 20px;
    }

    /* Estilo para los cursos relacionados en el modal */
    .related-course {
        margin-bottom: 20px;
    }
</style>

</body>
</html>
@endsection