@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalles de la Evaluación</h1>
        <h2>{{ $evaluation->nombre }}</h2>
        <p>Descripción: {{ $evaluation->descripcion }}</p>
        <p>Enlace: <a href="{{ $evaluation->enlace }}" target="_blank">{{ $evaluation->enlace }}</a></p>
        <!-- Otros detalles de la evaluación que desees mostrar -->

        <a href="{{ route('evaluations.index') }}">Volver a la lista de evaluaciones</a>
    </div>
@endsection
