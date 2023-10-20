<form method="POST" action="{{ route('evaluaciones.store') }}">
    @csrf
    <!-- Agrega campos para las preguntas y respuestas según tus necesidades -->
    <label for="respuesta_1">Pregunta 1:</label>
    <input type="text" name="respuesta_1" required>

    <label for="respuesta_2">Pregunta 2:</label>
    <input type="text" name="respuesta_2" required>

    <!-- Agrega más campos de preguntas y respuestas según tus necesidades -->

    <button type="submit">Enviar Evaluación</button>
</form>
