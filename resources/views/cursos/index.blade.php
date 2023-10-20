
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">
      
      <link rel="stylesheet" href="{{ asset('node_modules/bootstrap/dist/css/bootstrap.css') }}">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
      <link rel="stylesheet" href="{{ asset('css/stylo.css') }}">
@extends('layouts.app')

@section('content')
<div class="container miApp">
    <!-- Formulario de búsqueda -->
    <h3 class=" text-dark text-uppercase">Inicio>Todos los cursos </h3>
    <h5 class=" text-uppercase">Explora todos nuestros cursos de  APROVE</h5>
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
                    <option value="Educacion">Educacion</option>
                    <option value="programacion">Programacion</option>
                    <option value="idiomas">Idiomas</option>
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
    <div class="alert alert-info mt-3">
        <strong>No se encontraron cursos que coincidan con los criterios de búsqueda.</strong>
    </div>

    @endif

    <!-- Lista de cursos -->
    <div class="row mt-4">
        @foreach ($courses as $course)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset($course->imagen) }}" class="card-img-top" alt="{{ $course->titulo }}">
                    <div class="card-body">
                        <!-- Agregar un ícono a tu título de curso -->
                              <h5 class="card-title">
                                  <i class="fas fa-graduation-cap"></i> {{ $course->titulo }}
                              </h5>

                        
                        <p class="card-text">{{ $course->descripcion }}</p>
                        <p class="card-text">nivel:{{ $course->nivel }}</p>
                        <p class="card-text">{{ $course->duracion.'' }} horas</p>
                         <!-- Mostrar estrellas -->
                         <div class="rating">
                            @for ($i = 1; $i <= 5; $i++)
                             @if ($i <= $course->stars)
                          <i class="fas fa-star text-warning" ></i> <!-- Estrella llena si $i <= stars -->
                            @else
                          <i class="far fa-star"></i> <!-- Estrella vacía si $i > stars -->
                          @endif
                         @endfor
                          </div>
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

   
</div>
<div class="d-flex justify-content-center mt-4">
    <ul class="pagination">
        @if ($courses->onFirstPage())
            <li class="page-item disabled"><span class="page-link">Anterior</span></li>
        @else
            <li class="page-item"><a class="page-link" href="{{ $courses->previousPageUrl() }}">Anterior</a></li>
        @endif

        @foreach ($courses as $course)
            <li class="page-item {{ $courses->currentPage() == $course->url ? 'active' : '' }}">
                <a class="page-link" href="{{ $course->url }}">{{ $course->page }}</a>
            </li>
        @endforeach

        @if ($courses->hasMorePages())
            <li class="page-item"><a class="page-link" href="{{ $courses->nextPageUrl() }}">Siguiente</a></li>
        @else
            <li class="page-item disabled"><span class="page-link">Siguiente</span></li>
        @endif
    </ul>
</div>


<!-- Contenedor para cargar la información del curso de forma dinámica -->
<div id="curso-info-container" class="container mt-4">
</div>
<div class="container animate__animated animate__slideInDown">
    <img src="{{ asset('images/Banner.png') }}" alt="Imagen del banner" class="img-fluid" style=" width: 100%;">
</div>
<style>
    /* Estilo para el botón de búsqueda */
    .btn-buscar {
        background-color: #007BFF;
        color: white;
    }

    /* Estilo para el botón de "Entrar al curso" */
    .curso-link {
        background-color: #28A745;
        color: white;
    }

    /* Estilo para el mensaje de resultados vacíos */
    .alert-info {
        background-color: #f8f9fa;
        border-color: #e2e3e5;
        color: #343a40;
    }

    /* Estilo para las tarjetas de curso */
    .card {
        border: 1px solid #e2e3e5;
        border-radius: 8px;
        transition: transform 0.2s;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
    }
</style>

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


