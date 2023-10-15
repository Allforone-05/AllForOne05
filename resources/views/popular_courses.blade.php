

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Cursos Populares</h2>
        <div class="row">
            @foreach ($popularCourses as $course)
                <div class="col-md-4">
                    <div class="card">
                        <img src="{{ asset($course->imagen) }}" class="card-img-top" alt="Imagen del curso">
                        <div class="card-body">
                            <h5 class="card-title">{{ $course->titulo }}</h5>
                            <p class="card-text">{{ $course->descripcion }}</p>
                            <p class="card-text">Visualizaciones: {{ $course->visualizaciones }}</p>
                            <a href="{{ route('cursos.show', $course->id) }}" class="btn btn-primary">Ver más</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
