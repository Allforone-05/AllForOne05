@extends('layouts.app')

@section('content')
<div class="container miApp">
    <h1 class="text-center">Lista de Trabajos y Resúmenes</h1>

    <ul class="list-group">
        @foreach ($trabajosResumenes as $trabajoResumen)
            <li class="list-group-item">
                <a href="{{ route('trabajos_resumenes.show', $trabajoResumen) }}">
                    {{ $trabajoResumen->titulo }}
                </a>
            </li>
        @endforeach
    </ul>
</div>
@endsection
