
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">
      <link rel="stylesheet" href="{{ asset('css/stylo.css') }}">
      <link rel="stylesheet" href="{{ asset('node_modules/bootstrap/dist/css/bootstrap.css') }}">

@extends('layouts.app')

@section('content')
<div class="container miApp">
    <!-- Formulario de búsqueda -->
    <form action="{{ route('cursos.index') }}" method="GET">
        <div class="row mb-3">
            <div class="col-md-4">
                <input type="text" name="search" class="form-control" placeholder="Buscar por título o descripción">

            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-success">busca</button>
            </div>
            <div class="col-md-4">
                <select name="type" class="form-control">
                    <option value="">Todos los cursos</option>
                    <option value="Matemáticas">Matemáticas</option>
                    <option value="Inglés">Inglés</option>
                    <option value="Lengua y Literatura">Lengua y Literatura</option>
                    <!-- Agrega más opciones de tipo de curso aquí -->
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-success">Buscar</button>
            </div>
        </div>
    </form>

    <!-- Verificación de resultados de búsqueda -->
    @if ($courses->isEmpty())
        <div class="alert alert-info">
            No se encontraron cursos que coincidan con los criterios de búsqueda.
        </div>
    @endif

    <!-- Lista de cursos -->
    <div class="row">
        @foreach ($courses as $course)
            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="{{ asset($course->imagen) }}" class="card-img-top" alt="{{ $course->titulo }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $course->titulo }}</h5>
                        <p class="card-text">{{ $course->descripcion }}</p>
                        <p class="card-text">nivel:{{ $course->nivel }}</p>
                        <p class="card-text">{{ $course->duracion.'' }} horas</p>
                        @auth
                        <a href="{{ route('cursos.show', $course->id) }}" class="btn btn-success curso-link" data-curso-id="{{ $course->id }}">
                            Acceder al curso
                        </a>
                    @else
                        <p>Debes <a href="{{ route('register') }}" class=" text-decoration-none curso-link">registrarte</a> para acceder al curso.</p>
                    @endauth

                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Paginación de Bootstrap -->
    <div class="d-flex justify-content-center">
        {{ $courses->links() }}
    </div>
</div>

<!-- Contenedor para cargar la información del curso de forma dinámica -->
<div id="curso-info-container" class="container">
</div>

<script>
    // Script para manejar el evento de clic en los enlaces "Entrar al curso"
    document.addEventListener('DOMContentLoaded', function () {
        const cursoLinks = document.querySelectorAll('.curso-link');
        const cursoInfoContainer = document.getElementById('curso-info-container');

        cursoLinks.forEach(link => {
            link.addEventListener('click', function (e) {
                e.preventDefault();
                if (!auth()->check()) {
                    // Mostrar mensaje para usuarios no autenticados
                    alert('Debes registrarte para acceder al curso.');
                } else {
                    const cursoId = this.getAttribute('data-curso-id');
                    
                    // Realiza una solicitud AJAX para obtener la información del curso seleccionado
                    fetch(`/cursos/${cursoId}`)
                        .then(response => response.text())
                        .then(data => {
                            // Carga la información del curso en el contenedor
                            cursoInfoContainer.innerHTML = data;
                        })
                        .catch(error => {
                            console.error('Error al cargar el curso:', error);
                        });
                }
            });
        });
    });
</script>

@endsection


