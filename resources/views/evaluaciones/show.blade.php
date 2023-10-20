@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach ($evaluaciones as $evaluacion)
        <h1>Detalles de la Evaluación</h1>
        <h2>{{ $evaluacion->nombre }}</h2>
        <p>Descripción: {{$evaluacion->descripcion }}</p>
        <p>Enlace: <a href="{{ $evaluation->enlace }}" target="_blank">{{ $evaluacion->enlace }}</a></p>
        @endforeach
        <!-- Otros detalles de la evaluación que desees mostrar -->

        <a href="{{ route('evaluaciones') }}">Volver a la lista de evaluaciones</a>
    </div>
@endsection
