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
    
   

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="{{ asset('js/scroll.js') }}"></script>

<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/stylo.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="{{ asset('node_modules/bootstrap/dist/css/bootstrap.css') }}">

</head>
<body>
    <div id="app">
   
        <nav class="navbar navbar-expand-md navbar-expand-lg navbar-expand-xl navbar-light  shadow-sm fixed-top bg-  text-uppercase ">
            <div class="container  ">
               
                <a class="navbar-brand" href="{{ url('/home') }}" style="margin-bottom: 10px ">
                 <img src="{{ asset('images/logo-oficial.png') }}" alt="Logo de tu sitio web" width="150" height="150" style="margin-bottom: -60px ">
                 
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto  text-uppercase ml-auto">
                       
                        <li class="nav-item">
                            <a href="{{ url('/home') }}" class="  js-scroll-trigger   ml-2 text-sm text-gray-700 dark:text-gray-500  underline menunav ">inicio</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/informacion') }}" class="js-scroll-trigger  ml-2 text-sm text-gray-400 dark:text-gray-500 underline menunav">informacion</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/soluciones') }}" class="  js-scroll-trigger  ml-2 text-sm text-gray-700 dark:text-gray-500 underline menunav">soluciones</a>
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
                  <!--  <div class="top-header-left">
						<div class="top-header-block ">
							<a href="mailto:info@educationpro.com" itemprop="email" class="text-decoration-none"><i class="fas fa-envelope"></i> info@educationpro.com</a>
						</div>
						<div class="top-header-block text-decoration-none">
							<a href="tel:+9779813639131" itemprop="telephone"class="text-decoration-none"><i class="fa fa-phone bg-danger"></i> +977 9813639131</a>
						</div>
					</div>  -->
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                 <button class=" btn-info">  <a class="credenciales nav-link text-dark " href="{{ route('login') }}">{{ __('Login') }}</a></button> 
                                </li>
                            @endif
 
                            @if (Route::has('register'))
                                <li class="nav-item">
                                   <button class=" btn-info register "><a class="credenciales nav-link text-dark" href="{{ route('register') }}">{{ __('Register') }}</a></button> 
                                </li>
                            @endif
                        @else
                        <ul class="navbar-nav ml-auto navbar-expand-md">
                            <!-- ... otros elementos de la barra de navegación ... -->
                        
                            @auth
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" style="color: indigo" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
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
            <!-- Footer -->
   <!-- Footer -->
   <footer class=" text-white  position-sticky " style="  background-color: #172132;">
   
    <div class="container">
        <div class="row">
            <div class="col-md-3 text-white text-bold ">
                <h4></h4>
                    <!-- Agrega un enlace a la vista de contacto -->
                    <p><i class="fa fa-envelope  emoticonos"></i> <a href="{{ route('contact.show') }}" class="text-white">Contáctanos</a></p>
                <p><i class="fa fa-phone  emoticonos"></i> Teléfono: +505 823-456-78</p>
            </div>
            <div class="col-md-3 ">
                <div class="container">
                    <div class="footer-distributed">
                        <ul class=" socialfooter list-inline social-icons">
                            <li class="list-inline-item"><a href="#"><i class="fa fa-facebook emoticonos"></i></a></li>
                           <li class="list-inline-item"><a href="#"><i class="fa fa-twitter  emoticonos"></i></a></li>
                           <li class="list-inline-item"><a href="#"><i class="fa fa-instagram  emoticonos"></i></a></li>
                        </ul>
                    </div>
                </div>
                <ul class="list-inline social-icons">
                    
                </ul>
            </div>
        </div>
        <hr>
        <p>&copy; {{ date('Y') }} Aprove &copy; 2023. Todos los derechos reservados.</p>
        <p><a href="{{ route('politica_privacidad') }} " class=" text-white">Política de Privacidad</a> | <a href="{{ route('terminos_uso') }}" class=" text-white">Términos de Uso</a></p>
    </div>
</footer>

<!-- Estilos CSS personalizados para el footer -->
      <style>
        footer{
        
            margin-top: auto;
            background-color: #172132;
        }
    .social-icons a {
        font-size: 24px;
        color: #ffffff;
        margin-right: 10px;
      }
     </style>


    

    <!-- Include Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
