<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/stylo.css') }}">
    <link rel="stylesheet" href="{{ asset('node_modules/bootstrap/dist/css/bootstrap.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

</head>
<body>
    @extends('layouts.app')

    @section('content')
    <div class="container miApp animate__animated animate__slideInDown">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <span class=" text-center">Inicio>Formulario de secion</span>
                <br>
                <div class="card">
                     
                    <div class="card-header"><i class="fas fa-sign-in-alt"></i> {{ __('Inicia sesion Aqui') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fas fa-sign-in-alt"></i> {{ __('Inicia secion') }}
                                    </button>
                                     <br> <br>
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-danger text-white" href="{{ route('password.request') }}">
                                            <i class="fas fa-lock"></i> {{ __('Olvido su contraseña?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .miApp {
            background-color: #f0f0f0;
            padding: 20px;
        }
        .card {
            border: none;
            background-color: #007bff;
            color: #fff;
        }
        .card-header {
            font-weight: bold;
        }
        .form-check-label {
            color: #fff;
        }
    </style>
    @endsection
</body>
</html>
