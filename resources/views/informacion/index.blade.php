<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">
      <link rel="stylesheet" href="{{ asset('css/stylo.css') }}">
      <link rel="stylesheet" href="{{ asset('node_modules/bootstrap/dist/css/bootstrap.css') }}">
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Listado de Cursos</h1>

    <ul>
        @foreach($courses as $course)
            <li>
                <a href="{{ route('cursos.show', $course->id) }}">{{ $course->titulo }}</a>
            </li>

            <h3>Módulos</h3>
            <ul>
                @foreach ($course->modules as $module)
                    <li>{{ $module->titulo }}</li>
                     <h4>Descripcion</h4>
                    <p>{{ $module->descripcion }}</p>
                    <h4>contenido</h4>
                     <p>{{ $module->contenido }}</p>
                @endforeach
            </ul>
        @endforeach
    </ul>
    
</div>
  
@endsection
