<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">
      <link rel="stylesheet" href="{{ asset('css/stylo.css') }}">
      <link rel="stylesheet" href="{{ asset('node_modules/bootstrap/dist/css/bootstrap.css') }}">
  
@extends('layouts.app')

@section('content')
<div class="container miApp bg-warning"
    <h2>Términos de Uso</h2>
    <p>Aquí puedes agregar tus términos de uso y condiciones legales.</p>

    <!-- Agrega tus términos de uso aquí, por ejemplo: -->
    <h3>1. Uso del Sitio Web</h3>
    <p>Al utilizar este sitio web, aceptas cumplir con estos términos de uso...</p>

    <h3>2. Privacidad</h3>
    <p>Nuestra política de privacidad describe cómo recopilamos, guardamos y usamos tus datos...</p>

    <h3>3. Cookies</h3>
    <p>Este sitio web utiliza cookies para mejorar la experiencia del usuario...</p>

    <!-- Puedes seguir añadiendo más secciones de acuerdo a tus necesidades -->

    <h3>4. Contacto</h3>
    <p>Si tienes preguntas sobre estos términos de uso, por favor contáctanos...</p>
</div>
@endsection
