

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/stylo.css') }}">
<link rel="stylesheet" href="{{ asset('node_modules/bootstrap/dist/css/bootstrap.css') }}">

<!-- Vista FAQ (faq.blade.php) -->
 <!-- Extiende el diseño de tu sitio web -->
@extends('layouts.app')

<style>
    .faq-container {
        margin: 20px;
        margin-top: 300px;
    }

    .faq-item {
        margin-bottom: 20px;
        padding: 10px;
        border: 1px solid #ccc;
        background-color: #f9f9f9;
    }

    .question {
        font-weight: bold;
        color: #333;
    }

    .answer {
        margin-top: 10px;
        color: #666;
    }
</style>

   
   @section('content')
    <div class="faq-container miApp">
        <h2>Preguntas Frecuentes</h2>
        <ul class="faq-list">
            @foreach($faqs as $faq)
                <li class="faq-item">
                    <div class="question"><strong>Pregunta:</strong> {{$faq->pregunta}}</div>
                    <div class="answer"><strong>Respuesta:</strong> {{$faq->respuesta}}</div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
