<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
     <!-- Include Bootstrap CSS and JS -->

    <!-- Fonts -->

    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">
    <!-- Styles -->
    
   
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="{{ asset('js/scroll.js') }}"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
<!-- Agrega SweetAlert 2 CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.17/dist/sweetalert2.min.css">

<!-- Agrega SweetAlert 2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.17/dist/sweetalert2.min.js"></script>


<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/stylo.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">


</head>
<body>
    <div id="app ">

     <nav class="navbar navbar-expand-md navbar-expand-lg navbar-expand-xl navbar-light  shadow-sm fixed-top bg-  text-uppercase animate__animated animate__fadeIn">
            <div class="container  ">
               
                <a class="navbar-brand" href="{{ url('/home') }}" style="margin-bottom: 10px ">
                 <img src="{{ asset('images/logo-oficial.png') }}" alt="Logo de tu sitio web" width="100" height="100" style="margin-top: 0px ">
                 
                </a>

              
                <button type="button" class="navbar-toggler bg-info" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto  text-uppercase ml-auto text-md-left">
                       
                        <li class="nav-item">
                            <a href="{{ url('/home') }}" class="   js-scroll-trigger   ml-2 text-sm text-gray-700 dark:text-gray-500  underline menunav ">inicio</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/informacion') }}" class="js-scroll-trigger  ml-2 text-sm text-gray-400 dark:text-gray-500 underline menunav">Quienes Somos</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/articles') }}" class="  js-scroll-trigger  ml-2 text-sm text-gray-700 dark:text-gray-500 underline menunav">blogs</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/cursos') }}" class=" js-scroll-trigger  ml-2 text-sm text-gray-700 dark:text-gray-500 underline menunav">cursos</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/foro') }}" class=" js-scroll-trigger  ml-2 text-sm text-gray-700 dark:text-gray-500 underline menunav">foro</a>   
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/clases') }}" class=" js-scroll-trigger  ml-2 text-sm text-gray-700 dark:text-gray-500 underline menunav">clases</a>   
                        </li>
                       
                    </ul>
                 
                    <ul class="navbar-nav ml-auto  ">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                 <button class="btn text-write ">  <a class=" nav-link text-write btn btn-primary py-2 px-4  d-lg-block " href="{{ route('login') }}">{{ __('Login') }}</a></button> 
                                </li>
                            @endif
 
                            @if (Route::has('register'))
                                <li class="nav-item">
                                   <button class="btn  text-write  "><a class=" nav-link text-write btn btn-primary py-2 px-4  d-lg-block " href="{{ route('register') }}">{{ __('Register') }}</a></button> 
                                </li>
                            @endif
                        @else
                        <ul class="navbar-nav ml-auto navbar-expand-md">
                            <!-- ... otros elementos de la barra de navegación ... -->
                        
                            @auth
                          
                           
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" style="color: rgb(255, 255, 255)" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                                @if(Auth::user()->profile_photo)
                                    <img src="{{ asset('images/' . Auth::user()->profile_photo) }}" alt="Foto de Perfil" class="rounded-circle" width="40" height="40"> 
                                @else
                                    <i class="fa fa-user-circle"></i>
                                @endif
                               
                            </a>
                            
                        
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <!-- Agrega un enlace a la página de perfil  -->
                                    <a class="dropdown-item" style="color: indigo" href="{{ route('profile') }}">Mi Perfil</a>
                                
                        
                                    <!--  otras opciones del menú de usuario, como cerrar sesión, si es necesario -->
                                    <a class="dropdown-item " style="color: indigo" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                        
                                    <form id="logout-form" class="text-white" action="{{ route('logout') }}" method="POST" style="display: none;" style="color: indigo">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @endauth
                        </ul>
                        
                        @endguest
                        
                    </ul>

                </div>
            </div>
        </nav>

        <!-- resources/views/layouts/app.blade.php -->


            @yield('content')
              
     </div> 
       
<!-- Footer Start -->
<div class="container-fluid position-relative overlay-top bg-dark text-white-50 py-5 animate__animated animate__fadeIn" style="margin-top: 90px;">
    <div class="container mt-5 pt-5">
        <div class="row">
            <div class="col-md-6 mb-5">
                <a href="index.html" class="navbar-brand">
                    <h1 class="mt-n2 text-uppercase text-white"><i class="fa fa-book-reader mr-3"></i>APROVE</h1>
                </a>
                <p class="m-0 animate__animated animate__fadeInLeft">En APROVE ofrecemos un acompañamiento profesional virtual de calidad, basado en el conocimiento y la experiencia, para potenciar el aprendizaje y el crecimiento personal de nuestros clientes. A través de nuestra plataforma virtual, buscamos facilitar el acceso a recursos educativos, ofrecer asesoramiento pedagógico y promover el desarrollo de habilidades y competencias necesarias en el ámbito educativo</p>
            </div>
            <div class="col-md-6 mb-5">
                <h3 class="text-white mb-4">Informate Facil y Rapido</h3>
                <div class="w-100">
                    <div class="input-group">
                        <input type="text" class="form-control border-light" style="padding: 30px;" placeholder="Su direccion de correo electronico">
                        <div class="input-group-append">
                            <button class="btn btn-primary px-4">inscribirse</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 mb-5">
                <h3 class="text-white mb-4">Contactanos </h3>
                <p><i class="fa fa-map-marker-alt mr-2"></i>Chinandega, Nicaragua</p>
                <p><i class="fa fa-phone-alt mr-2"></i> <a class=" text-dark" href="tel: +505 85429144" ></a>
                    (+505) 
                    86444291</p>
                <p><i class="fa fa-phone-alt mr-2"></i> <a href="{{ route('contact.show') }}" class="text-white-50">Contáctanos</a></p>
                <p><i class="fa fa-envelope mr-2"></i>APROVE@gmail.com</p>
               

                <div class="d-flex justify-content-start mt-4">
                    <a class="text-white mr-4" href="https://wa.me/50586444291?text=!Hola quiero agendar una cita !">
                    <i class="fab fa-whatsapp"></i></a>
                    <a class="text-white mr-4" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="text-white mr-4" href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a class="text-white" href="#"><i class="fab  fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-md-4 mb-5">
                <h3 class="text-white mb-4">Nuestros Colaboradores  </h3>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>APM</a>
                    <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>NICARAGUA LIBRE</a>
                    <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>IFDEV</a>
                    
                </div>
            </div>
            <div class="col-md-4 mb-5">
                <h3 class="text-white mb-4">Mas Sobre APROVE</h3>
                <div class="d-flex flex-column justify-content-start">
                    
                    <a href="{{ route('politica_privacidad') }} " class="text-white-50 mb-2"><i class="fa fa-angle-right mr-2"></i>Políticas de Privacidad</a> 
                    <a href="{{ route('terminos_uso') }}" class=" text-white-50 mb-2"><i class="fa fa-angle-right mr-2"></i>Términos de Uso</a>
                    <a href="{{ route('faq') }}" class="text-white-50 mb-2"><i class="fa fa-angle-right mr-2"></i>FAQ</a>
                    
                    <a href="{{ route('contact.show') }}" class="text-white-50"><i class="fa fa-angle-right mr-2"></i>Contáctanos</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid bg-dark text-white-50 border-top py-4" style="border-color: rgba(256, 256, 256, .1) !important;">
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-center text-md-left mb-3 mb-md-0">
                
                <p  class="m-0 text-white"> &copy; {{ date('Y') }} APROVE . Todos los derechos reservados.</p>
            </div>
            <div class="col-md-6 text-center text-md-right">
                <p class="m-0">Soluciones <a class="text-white" href=""> APROVE</a>
                </p>
            </div>
        </div>
    </div>
</div>
<!-- Estilos CSS personalizados para el footer -->
      <style>
       

      
   footer {
      background-color: #172132;
      padding: 20px 0; /* Ajusta este valor para cambiar la altura del footer */
     
   }

   /* Agrega estilos CSS personalizados para los íconos sociales en el footer */
   .social-icons a {
      font-size: 24px;
      color: #ffffff;
      margin-right: 10px;
   }
</style>


    <!-- Include Bootstrap JS and jQuery -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<script src="lib/easing/easing.min.js"></script>
<script src="lib/waypoints/waypoints.min.js"></script>
<script src="lib/counterup/counterup.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>

<!-- Template Javascript -->
<script src="js/main.js"></script>
<script>
    // Script para manejar la apertura y cierre del menú en dispositivos móviles
    $(document).ready(function() {
        $(".navbar-toggler").click(function() {
            $("#navbarSupportedContent").toggleClass("show");
        });

        // Cerrar el menú cuando se hace clic en un enlace del menú
        $(".navbar-nav a").click(function() {
            if ($("#navbarSupportedContent").hasClass("show")) {
                $("#navbarSupportedContent").removeClass("show");
            }
        });
    });
</script>

</body>
</html>




   
       

