       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">
      <link rel="stylesheet" href="{{ asset('js/font-awesome.min.css') }}">
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">
      <link rel="stylesheet" href="{{ asset('css/stylo.css') }}">
   
  

@extends('layouts.app') 

@section('content')
<body>
@php
    // Obtén una lista de cursos populares directamente en la vista
    $popularCourses = \App\Models\Course::orderByDesc('visualizaciones')->take(4)->get();
@endphp
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

<div class="red">
     <div id="facebook"><a href="#" class="fab fa-facebook-f"></a></div>
     <div id="youtube"><a href="#" class="fab fa-youtube"></a></div>
     <div id="twitter"><a href="#" class="fab fa-twitter"></a></div>
     <div id="correo"><a href="#" class="fas fa-envelope-square"></a></div>
</div>
  
  
<div class="container miApp carrusel">
    <!-- Carrusel de imágenes -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicadores -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <!-- Agrega más indicadores según el número de imágenes -->
        </ol>

        <!-- Carrusel de imágenes -->
        <div class="carousel-inner " style="font-weight: bolder">
            <div class="carousel-item active">
                <img src="{{ asset('images/marqueting-digital.jpg') }}" alt="Imagen 1" class="d-block w-100">
                <div class="carousel-caption">
                    <button class="botoncarrusel">
                        contacto
                    </button>
                    
                    <p>Acompañamiento profesional </p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/carrusel1.jpg') }}" alt="Imagen 2" class="d-block w-100">
                <div class="carousel-caption">
                    <p>Recursos educativos y asesoramiento.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/carrusel2.jpg') }}" alt="Imagen 3" class="d-block w-100">
                <div class="carousel-caption">
                    <p>Estamos comprometidos con el éxito de nuestros clientes</p>
                </div>
            </div>
            <!-- Agrega más elementos de carrusel según el número de imágenes -->
        </div>

        <!-- Controles de carrusel -->
        <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>
</div>
<div class="container mt-4 informacion-section">
    <div class="row">
        <div class="col-md-6">
            <h2>¿Qué es nuestra aplicación web?</h2>
            <p>
                Ofrecemos  un acompañamiento profesional virtual de calidad, basado en el conocimiento y la experiencia,
                 para potenciar el aprendizaje y el crecimiento personal de nuestros clientes. 
                 A través de nuestra plataforma virtual, buscamos facilitar el acceso a recursos educativos, 
                 ofrecer asesoramiento pedagógico y promover el desarrollo de habilidades y competencias necesarias en el ámbito educativo.
                 <span>Con nuestros cursos educativos podras crecer y desarrollar todas tus habilidades.</span>
                </p>
        </div>
        <div class="col-md-6 text-center">
            <!-- Aquí puedes agregar emoticonos -->
            <p class="emoticonos">😃🌟📚</p>
        </div>
    </div>
</div>
 


<!-- Publicidad para promocionar cursos en la vista home -->
<div class="advertisement-container">
    <div class="advertisement-content">
        <div class="advertisement-image">
            <img src="{{ asset('images/publicidad.jpg') }}"  alt="Publicidad de cursos"  class="d-block w-100">
        </div>
        <div class="advertisement-text">
            <h3>¡Descubre nuestros cursos en línea!</h3>
            <p>Aprende nuevas habilidades con nuestros cursos en línea de alta calidad.</p>
            <a href="{{ route('cursos.index') }}" class="btn  text-white" style="background-color: rgb(140, 59, 198)">Explora Cursos</a>
        </div>
    </div>
    <button id="closeAd" class="close-button">&times;</button>
</div>




   <div class="container">

       <h2>Cursos Populares</h2>
       <div class="row">
           @php
               $popularCoursesChunked = $popularCourses->chunk(4); // Divide los cursos en grupos de 4
           @endphp
   
           @foreach ($popularCoursesChunked as $chunk)
               @foreach ($chunk as $popularCourse)
                   <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                       <div class="card">
                        <img src="{{ asset($popularCourse->imagen) }}" class class="card-img-top img-fluid" alt="Imagen del curso">
                           <div class="card-body">
                               <h5 class="card-title">{{ $popularCourse->titulo }}</h5>
                               <p class="card-text">{{ $popularCourse->descripcion }}</p>
                               <p class="card-text">Visualizaciones: {{ $popularCourse->visualizaciones }}</p>
                               <a href="{{ route('cursos.show', $popularCourse->id) }}" class="btn btn text-white buttonshow" >Ver más</a>
                               
                           </div>
                       </div>
                   </div>
               @endforeach
           @endforeach
       </div>
   </div>
   
   <!-- Paginación si hay más cursos -->
   @if ($popularCourses->count() > 4)
       <div class="container mt-4">
           <div class="row justify-content-center">
               <div class="col-md-6">
                   {{ $popularCourses->links() }}
               </div>
           </div>
       </div>
   @endif

   <div id="advertisement" class="advertisement">
    <button id="closeAd" class="close-button">&times;</button>
    <img src="{{ asset('images/publicidad.jpg') }}"  alt="Publicidad de cursos"  class="d-block w-100">
    <a href="{{ route('cursos.index') }}">
    <p>¡Descubre nuestros cursos destacados!</p>
    </div>
   
    <!-- En la vista home.blade.php -->
<nav>
    <!-- Otras opciones de navegación -->
    <a href="{{ route('faq') }}" class=" text-decoration-none">Preguntas Frecuentes</a>
</nav>


                    @if (session('status'))
                        <div class="alert " role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ __('') }}
               

<script>
    // Inicializa el carrusel
    $(document).ready(function() {
        $('#myCarousel').carousel();
    });
    //  codigo de publicidad 
    // JavaScript para mostrar la publicidad
document.addEventListener("DOMContentLoaded", function () {
    var advertisement = document.getElementById("advertisement");
    var closeAdButton = document.getElementById("closeAd");

    // Mostrar la publicidad cuando la página se cargue completamente
    advertisement.style.display = "block";

    // Cerrar la publicidad cuando se haga clic en el botón de cierre
    closeAdButton.addEventListener("click", function () {
        advertisement.style.display = "none";
    });
});
    // JavaScript para cerrar la publicidad al hacer clic en el botón de cierre
    document.addEventListener("DOMContentLoaded", function () {
        var closeAdButton = document.getElementById("closeAd");
        var advertisementContainer = document.querySelector(".advertisement-container");

        closeAdButton.addEventListener("click", function () {
            advertisementContainer.style.display = "none";
        });
    });
</script>

@endsection
</body>
</html>