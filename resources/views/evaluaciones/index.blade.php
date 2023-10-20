@extends('layouts.app')

@section('content')
    <div class="container miApp">
        <h1>Listado de Evaluaciones</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Descripción</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($evaluaciones as $evaluacion)
                <tr>
                    <td>{{ $evaluacion->id }}</td>
                    <td>{{ $evaluacion->titulo }}</td>
                    <td>{{ $evaluacion->descripcion }}</td>
                    <td>{{ $evaluacion->created_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
