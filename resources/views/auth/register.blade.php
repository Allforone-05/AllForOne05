<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/stylo.css') }}">
    <link rel="stylesheet" href="{{ asset('node_modules/bootstrap/dist/css/bootstrap.css') }}">
</head>
<body>
    



      @extends('layouts.app')

      @section('content')
      <div class="container miApp animate__animated animate__slideInDown">
          <div class="row justify-content-center">
           
              <div class="col-md-8">
                <span>Inicio>Registro</span>
                br
                  <div class="card" style="background-color: #f5f5f5; border: 2px solid #007bff;">
                      <div class="card-header text-bold text-white" style="background-color: #007bff; text-align: center; font-size: 24px; padding: 15px;">{{ __('Registrate Aqui') }}</div>
      
                      <div class="card-body text-dark">
                          <form method="POST" action="{{ route('register') }}">
                              @csrf
      
                              <div class="form-group row">
                                  <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>
      
                                  <div class="col-md-6">
                                      <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
      
                                      @error('name')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                              </div>
      
                              <div class="form-group row">
                                  <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo ') }}</label>
      
                                  <div class="col-md-6">
                                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
      
                                      @error('email')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                              </div>
      
                              <div class="form-group row">
                                  <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>
      
                                  <div class="col-md-6">
                                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
      
                                      @error('password')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                              </div>
      
                              <div class="form-group row">
                                  <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Contraseña') }}</label>
      
                                  <div class="col-md-6">
                                      <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                  </div>
                              </div>
      
                              <div class="form-group row mb-0">
                                  <div class="col-md-6 offset-md-4">
                                      <button type="submit" class="btn btn-success" style="background-color: #4CAF50; border: none;">
                                          {{ __('Registrarse') }}
                                      </button>
                                  </div>
                              </div>
                          </form>
                      </div>
                  </div>
                  <!-- Mensaje de registro exitoso -->
                  @if(session('success'))
                      <div class="alert alert-success mt-3 text-center" role="alert">
                          {{ session('success') }}
                      </div>
                  @endif
              </div>
          </div>
      </div>
      @endsection
    </body>
    </html>