

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/stylo.css') }}">
<link rel="stylesheet" href="{{ asset('node_modules/bootstrap/dist/css/bootstrap.css') }}">

<!-- Vista FAQ (faq.blade.php) -->

@extends('layouts.app')

@section('content')
    <div class="faq-container">
        <h2>Preguntas Frecuentes</h2>
        <ul class="faq-list">
            @foreach($faqs as $faq)
                <li class="faq-item">
                    <div class="question">{{$faq->pregunta}}</div>
                    <div class="answer">{{$faq->respuesta}}</div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection