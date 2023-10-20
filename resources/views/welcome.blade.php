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
    
    
      
    <div class="container miApp carrusel">
        <!-- Carrusel de imágenes -->
        <div id="myCarousel" class="carousel slide animate__animated animate__slideInDown" data-ride="carousel">
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
                <img src="{{ asset('images/portada_1.png') }}" alt="Imagen 1" class="d-block w-100">
                <div class="carousel-caption">
                    
                    
                    <p> </p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/portada_2.png') }}" alt="Imagen 2" class="d-block w-100">
                <div class="carousel-caption">
                    <p>.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/portada_3.png') }}" alt="Imagen 3" class="d-block w-100">
                <div class="carousel-caption">
                    <p></p>
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
    <div class="container mt-4 informacion-section bg-secondary-50 animate__animated animate__slideInDown">
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
                  <Span>APROVE</Span>
            </div>
        </div>
    </div>
     <br>
    
    
    <!-- Publicidad para promocionar cursos en la vista home -->
    <div class="advertisement-container animate__animated animate__slideInDown">
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
      <br>
          <div class="container animate__animated animate__slideInDown">
    
            <h4  class=" text-center">Cursos Populares</h4>
            <p class=" text-center">Informate acerca de nuestros cursos populares </p>
           <div class="row mt-4">
               @php
                   $popularCoursesChunked = $popularCourses->chunk(4); // Divide los cursos en grupos de 4
               @endphp
       
               @foreach ($popularCoursesChunked as $chunk)
                   @foreach ($chunk as $popularCourse)
                       <div class="col-lg-3 col-md-4 col-sm-6 ">
                           <div class="card">
                            <img src="{{ asset($popularCourse->imagen) }}" class class="card-img-top img-fluid" alt="Imagen del curso">
                               <div class="card-body">
                                   <h5 class="card-title">{{ $popularCourse->titulo }}</h5>
                                   <p class="card-text">nivel:{{$popularCourse->nivel }}</p>
                                   <p class="card-text">{{ $popularCourse->duracion.'' }} horas</p>
                                   <p class="card-text">Visualizaciones: {{ $popularCourse->visualizaciones }}</p>
                               
                                     <!-- Mostrar estrellas -->
                                 <div class="rating">
                                 @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= $popularCourse->stars)
                               <i class="fas fa-star text-warning" ></i> <!-- Estrella llena si $i <= stars -->
                                @else
                               <i class="far fa-star"></i> <!-- Estrella vacía si $i > stars -->
                              @endif
                                @endfor
                                 </div>
                                   @auth
                                   <a href="{{ route('cursos.show',  $popularCourse->id) }}" class="btn btn-success curso-link" data-curso-id="{{  $popularCourse->id }}">
                                       Acceder al curso
                                   </a>
                               @else
                                   <p class=" text-secondary opacity-50">Debes <a href="{{ route('register') }}" class=" text-decoration-none curso-link">registrarte</a> para acceder al curso.</p>
                               @endauth
                                  
                                   
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
       <div class="accordion text-left text-decoration-none list-style-none animate__animated animate__slideInDown" id="accordionExample">
         <div class="card">
           <div class="card-header" id="headingOne">
             <h2 class="mb-0">
              <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                <h3 class=" text-info text-decoration-none ">Visión</h3>
               
               
              </button>
               </h2>
            </div>
      
          <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
             <p>Ser líderes en la prestación de servicios de acompañamiento profesional virtual educativo, <br>
                 brindando apoyo y orientación a estudiantes e instituciones educativas en su proceso <br>
                  de formación y desarrollo..</p>
            </div>
           </div>
           </div>
        
        <div class="card animate__animated animate__slideInDown">
          <div class="card-header" id="headingTwo">
            <h2 class="mb-0">
              <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                <h3 class=" text-info text-decoration-none">Misión</h3>
              </button>
            </h2>
          </div>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
            <div class="card-body">
                <p>Nuestra misión es ofrecer un acompañamiento profesional virtual de calidad, basado en el conocimiento <br>
                     y la experiencia, para potenciar el aprendizaje y el crecimiento personal de nuestros clientes. A través de <br>
                      nuestra plataforma virtual, buscamos facilitar el acceso a recursos educativos, ofrecer asesoramiento pedagógico <br>
                      y promover el desarrollo de habilidades y competencias necesarias en el ámbito educativo.</p>
            </div>
          </div>
        </div>
        
        <div class="card animate__animated animate__slideInDown">
            <div class="card-header" id="headingTwoo">
              <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwoo" aria-expanded="false" aria-controls="collapseTwoo">
                    <h3 class=" text-info text-decoration-none">Nuestros valores </h3>
                </button>
              </h2>
            </div>
            <div id="collapseTwoo" class="collapse" aria-labelledby="headingTwoo" data-parent="#accordionExample">
              <div class="card-body">
                <p>
                    Excelencia: Nos esforzamos por ofrecer un servicio de calidad, superando las expectativas de nuestros clientes y promoviendo la mejora continua en todo lo que hacemos. <br>
                    
                    Compromiso: Estamos comprometidos con el éxito de nuestros clientes, brindando un acompañamiento personalizado y adaptado a sus necesidades individuales.  <br>
                    
                    Innovación: Buscamos constantemente nuevas formas de mejorar nuestros servicios y adaptarnos a las demandas cambiantes del entorno educativo virtual.  <br>
                    
                    Colaboración: Fomentamos un ambiente de trabajo colaborativo, tanto internamente como con nuestros clientes, promoviendo el intercambio de conocimientos y la creación de redes de apoyo.  <br>
                    
                    Ética: Nos regimos por principios éticos en todas nuestras acciones, asegurando la confidencialidad, la integridad y el respeto en nuestras relaciones con los clientes y la comunidad educativa en general.</p>
              </div>
            </div>
          </div>
        <!-- Agrega más secciones según tus necesidades -->
      </div>
      <div class="container animate__animated animate__slideInDown">
        <img src="{{ asset('images/Banner.png') }}" alt="Imagen del banner" class="img-fluid" style=" width: 100%;">
    </div>
       
    <div class="container mt-4 animate__animated animate__slideInDown">
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="text-center">
                    <p class="display-4"><i class="fas fa-graduation-cap emoticonos"></i></p>
                    <p class="lead">+ 20</p>
                    <p>Cursos gratis en línea</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="text-center">
                    <p class="display-4"><i class="fas fa-users emoticonos"></i></p>
                    <p class="lead">+ 100</p>
                    <p>Estudiantes felices</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="text-center">
                    <p class="display-4"><i class="fas fa-language emoticonos"></i></p>
                    <p class="lead">+ 10</p>
                    <p>Idiomas</p>
                </div>
            </div>
        </div>
    </div>

    <h2 class="text-center animate__animated animate__slideInDown">Cursos Destacados <span class="emoji">⭐</span></h2>

    @if(isset($featuredCourses) && $featuredCourses->count() > 0)
    <div class="carousel-inner animate__animated animate__slideInDown">
        @foreach ($featuredCourses as $key => $course)
            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                <img src="{{ asset($course->imagen) }}" alt="{{ $course->titulo }}" class="img-fluid d-none d-md-block">
                <div class="carousel-caption">
                    <h3>{{ $course->titulo }}</h3>
                   <p>{{ $course->descripcion }}</p> 

                   
                   @auth
                   <a href="{{ route('cursos.show',  $Course->id) }}" class="btn btn-success curso-link" data-curso-id="{{  $Course->id }}">
                       Acceder al curso
                   </a>
               @else
                   <p class=" text-secondary opacity-50">Debes <a href="{{ route('register') }}" class=" text-decoration-none curso-link">registrarte</a> para acceder al curso.</p>
               @endauth
                 
                </div>
            </div>
        @endforeach
    </div>
    
@else
    <p class="text-center animate__animated animate__slideInDown ">No hay cursos destacados disponibles en este momento.</p>
@endif
           <hr>
           <div class="container text-center justify-content-center animate__animated animate__slideInDown">
               <div class=" text-center text-center justify-content-center">
                  <!-- Aquí puedes agregar emoticonos -->
                   <p class="emoticonos  bg-info">😃🌟📚</p>
                  
                </div>
                 <p class=" ">Si quieres explorar mas acercas de nuestros cursos <br>
                y soluciones educativas   <a href="{{ route('register') }}" 
                class=" text-decoration-none curso-link">registrate</a>y explora los multiples beneficios de la plataforma . </p>
           </div>

       
        <!-- En la vista home.blade.php -->
    
    
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

</body>
</html>

@endsection