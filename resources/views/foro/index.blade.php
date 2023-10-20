<html>
<link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">
<link rel="stylesheet" href="{{ asset('js/font-awesome.min.css') }}">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/stylo.css') }}">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

<!-- resources/views/foro/index.blade.php -->
<body>
    

@extends('layouts.app')

@section('content')
    <div class="container miApp">
        <h2>Foro</h2>

        <!-- Formulario para publicar un mensaje -->
        @auth
            <form method="post" action="{{ route('foro.publicar') }}">
                @csrf
                <div class="form-group">
                    <textarea class="form-control" name="contenido" rows="3" placeholder="Escribe tu mensaje"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Publicar</button>
            </form>
        @else
            <p class="mensaje-inicia-sesion">Inicia sesión para participar en el foro.</p>
        @endauth

        <!-- Lista de mensajes -->
        <ul class="list-group">
            @foreach ($mensajes as $mensaje)
            <li class="list-group-item mensaje">
                <div class="d-flex justify-content-between">
                    <!-- Foto de perfil del usuario -->
                    <div class="foto-perfil">
                        <img src="{{ asset($mensaje->user->foto_perfil) }}" alt="Foto de perfil del usuario" class="img-foto-perfil">
                        <!-- Mostrar el nombre de usuario si el usuario está autenticado -->
                        @auth
                            <p class="nombre-usuario">{{ $mensaje->user->nombre_usuario }}</p>
                        @endauth
                    </div>
                    <div class="acciones">
                        <!-- Botón "Me gusta" -->
                        @auth
                            <form method="post" action="{{ route('foro.megusta', $mensaje->id) }}">
                                @csrf
                                <button type="submit" class="btn btn-link btn-sm"><i class="fas fa-thumbs-up"></i> Me gusta</button>
                            </form>
                        @endauth
                    </div>
                </div>
                <!-- Contenido del mensaje -->
                <p class="contenido-mensaje">{{ $mensaje->contenido }}</p>
                <!-- Mostrar la cantidad de "Me gusta" -->
                <p class="megusta"><i class="far fa-thumbs-up"></i> {{ $mensaje->megusta->count() }} Me gusta</p>
                <!-- Formulario para responder al mensaje -->
                @auth
                    <form method="post" action="{{ route('foro.responder', $mensaje->id) }}">
                        @csrf
                        <div class="form-group">
                            <textarea class="form-control" name="respuesta" rows="2" placeholder="Escribe tu respuesta"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">Responder</button>
                    </form>
                @endauth
            </li>
            @endforeach
        </ul>
    </div>
@endsection

</body>
</html>