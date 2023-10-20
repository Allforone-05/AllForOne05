@extends('layouts.app')

@section('content')
<div class="faq-container miApp">
    <h2>Preguntas Frecuentes</h2>
    <div class="faq-list">
        @foreach($faqs as $faq)
            <div class="faq-item">
                <div class="faq-question">
                    <span class="faq-icon">+</span>
                    <strong>Pregunta:</strong> {{$faq->pregunta}}
                </div>
                <div class="faq-answer">
                    <strong>Respuesta:</strong> {{$faq->respuesta}}
                </div>
            </div>
        @endforeach
    </div>
</div>

<script>
    // Script para controlar el plegado/plegado de respuestas
    const faqItems = document.querySelectorAll('.faq-item');

    faqItems.forEach(item => {
        const question = item.querySelector('.faq-question');
        const answer = item.querySelector('.faq-answer');

        question.addEventListener('click', () => {
            item.classList.toggle('active');
        });
    });
</script>

<style>
    /* Estilos adicionales para el efecto de plegado/plegado */
    .faq-question {
        cursor: pointer;
    }

    .faq-icon {
        display: inline-block;
        margin-right: 10px;
    }

    .faq-item.active .faq-answer {
        display: block;
    }

    .faq-answer {
        display: none;
        margin-top: 10px;
        color: #666;
    }
</style>
@endsection

