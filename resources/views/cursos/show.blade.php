<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">
      <link rel="stylesheet" href="{{ asset('css/stylo.css') }}">
      <link rel="stylesheet" href="{{ asset('node_modules/bootstrap/dist/css/bootstrap.css') }}">

@extends('layouts.app')

@section('content')
<body>
<div class="container miApp">
    <div class="card mb-3">
        <img src="{{ asset($course->imagen) }}" alt="{{ $course->titulo }}" class="card-img-top">
        <div class="card-body">
            <h1 class="card-title">{{ $course->titulo }}</h1>
            <p class="card-text">{{ $course->descripcion }}</p>
        </div>
    </div>

    <h2>¿Qué Aprenderás?</h2>
    <ul class="list-group">
        @foreach ($course->modules as $module)
            @foreach ($module->resources as $resource)
                <li class="list-group-item">
                    @if ($resource->tipo === 'video')
                        <a href="{{ $resource->url }}" target="_blank">{{ $resource->nombre }}</a> (Video)
                    @elseif ($resource->tipo === 'pdf')
                        <a href="{{ $resource->url }}" target="_blank">{{ $resource->nombre }}</a> (PDF)
                    @else
                        {{ $resource->nombre }}
                    @endif
                </li>
            @endforeach
        @endforeach
    </ul>

    <h2>Audiencia Objetivo</h2>
    <p>{{ $course->audiencia_objetivo }}</p>

    <h2>Programa del Curso</h2>
    <ul class="list-group">
        @foreach ($course->modules as $module)
            <li class="list-group-item">
                <h3>{{ $module->titulo }}</h3>
                
                <ul class="list-group">
                    @foreach ($module->resources as $resource)
                        <li class="list-group-item">
                            @if ($resource->tipo === 'video')
                                <a href="{{ $resource->url }}" target="_blank">{{ $resource->nombre }}</a> (Video)
                            @elseif ($resource->tipo === 'pdf')
                                <a href="{{ $resource->url }}" target="_blank">{{ $resource->nombre }}</a> (PDF)
                            @else
                                {{ $resource->nombre }}
                            @endif
                        </li>
                    @endforeach
                </ul>
            </li>
        @endforeach
    </ul>

    <h2>Evaluación</h2>
    <p>Al final de cada unidad, encontrarás ejercicios de práctica y preguntas de evaluación para poner a prueba tus conocimientos adquiridos en esa unidad. Estos ejercicios te ayudarán a medir tu progreso y comprensión del material.</p>
</div>
</body>
</html>

@endsection

