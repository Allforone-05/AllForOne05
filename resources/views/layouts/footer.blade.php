

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<link rel="stylesheet" href="{{ asset('node_modules/bootstrap/dist/css/bootstrap.css') }}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/stylo.css') }}">
<link rel="stylesheet" href="{{ asset('node_modules/bootstrap/dist/css/bootstrap.css') }}">

<!-- Estilos CSS personalizados para el footer -->
<style>
    footer{
        
    }
    .social-icons a {
        font-size: 24px;
        color: #fff;
        margin-right: 10px;
      }
     </style>
        <!-- Footer -->
<!-- Footer -->

<footer class=" text-white " style="background-color: rgb(194, 73, 186)">
<div class="container">
    <div class="row">
        <div class="col-md-6 text-white text-bold ">
            <h4>Contacto</h4>
            <p><i class="fas fa-envelope"></i> Correo electrónico: info@Aprove.com</p>
            <p><i class="fa fa-phone"></i> Teléfono: +505 823-456-78</p>
        </div>
        <div class="col-md-6 text-white">
            <h4></h4>
            <ul class="list-inline social-icons">
                <li class="list-inline-item"><a href="#"><i class="fab fa-facebook"></i></a></li>
                <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                <li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
            </ul>

             <!-- Agrega un enlace a la vista de contacto -->
             <p><i class="fas fa-envelope"></i> <a href="{{ route('contact.show') }}">Contáctanos</a></p>
        </div>
    </div>
    <hr>
    <p>&copy; {{ date('Y') }} Aprove. Todos los derechos reservados.</p>
    <p><a href="{{ route('politica_privacidad') }} " class=" text-white">Política de Privacidad</a> | <a href="{{ route('terminos_uso') }}" class=" text-white">Términos de Uso</a></p>
</div>
</footer>






<!-- Include Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
