<!-- resources/views/trabajos_resumenes/show.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center">Detalles de Trabajo o Resumen</h1>

    <div class="card">
        <div class="card-header">
            <h2>{{ $trabajoResumen->titulo }}</h2>
        </div>
        <div class="card-body">
            <p>Subido por: {{ $trabajoResumen->user->name }}</p>
            <a href="{{ asset('storage/' . $trabajoResumen->archivo_path) }}" target="_blank" class="btn btn-primary">Ver Archivo</a>
        </div>
    </div>
</div>
@endsection
