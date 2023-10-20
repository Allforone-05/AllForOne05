
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">
      <link rel="stylesheet" href="{{ asset('css/stylo.css') }}">
      <link rel="stylesheet" href="{{ asset('node_modules/bootstrap/dist/css/bootstrap.css') }}">
@extends('layouts.app')

@section('content')
<div class="container miApp">

    <h2 class="text-center animate__animated animate__fadeIn">Bienvenido a tu perfil. En este formulario, puedes actualizar tu información de perfil.</h2>
    <!-- El elemento con la clase "animate__animated animate__fadeIn" tendrá una animación de desvanecimiento -->
    <div class="row justify-content-center animate__animated animate__fadeIn">
        <div class="col-md-8">
            <div class="card " style="background-color:#930167; ">
                <div class="card-header text-bold text-white"><h3>Mi Perfil</h3></div>

                <div class="card-body text-dark">
                    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">Nombre:</label>
                            <input id="name" type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Correo Electrónico:</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ Auth::user()->email }}" required>
                        </div>

                        <div class="form-group">
                            <label for="profile_photo">Foto de Perfil:</label>
                            <input id="profile_photo" type="file" class="form-control" name="profile_photo">
                            @if(Auth::user()->profile_photo)
                            <img src="{{ asset('images/' . Auth::user()->profile_photo) }}" alt="Foto de Perfil" width="100">
                            @endif
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Actualizar Perfil</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
@endsection
