
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
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card " style="background-color:#007bff; ">
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
                            <button type="submit" class="btn btn-primary buttonshow">Actualizar Perfil</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container d-flex justify-content-center mt-5">

        <div class="profile-card">

                    <div class="profile-image text-center mt-4">

                        <div class="form-group">
                            <label for="profile_photo">Foto de Perfil:</label>
                            <input id="profile_photo" type="file" class="form-control" name="profile_photo">
                            @if(Auth::user()->profile_photo)
                                <img src="{{ asset('images/' . Auth::user()->profile_photo) }}" alt="Foto de Perfil" class="img-fluid rounded-circle img-thumbnail" width="130">
                            @endif
                      
                        
                    </div>

            <div class="profile text-center mt-2 text-white">
                
                    <h3 class="mt-2">Maria samantha</h3>
                    <span class="d-block">California, USA</span>

                    <span class="d-block mt-3">Software developer and <br> Java Architect</span>

                    <div class="mt-4">

                        <button class="btn msg-button">Message</button>
                        <button class="btn msg-button">Following</button>
                        

                    </div>

                    <div class="icons">

                        <li><a href=""><i class="fa fa-facebook"></i></a></li>
                        <li><a href=""><i class="fa fa-twitter"></i></a></li>
                        <li><a href=""><i class="fa fa-instagram"></i></a></li>
                        

                    </div>


            </div>

        </div>
        
    </div>

</div>
@endsection
