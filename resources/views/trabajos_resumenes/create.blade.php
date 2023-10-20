<!-- resources/views/trabajos_resumenes/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center">Subir Nuevo Trabajo o Resumen</h1>

    <form action="{{ route('trabajos_resumenes.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="titulo">Título:</label>
            <input type="text" name="titulo" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="archivo">Archivo (PDF):</label>
            <input type="file" name="archivo" accept=".pdf" required>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Subir Trabajo o Resumen</button>
        </div>
    </form>
</div>
@endsection
