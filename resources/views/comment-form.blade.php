<form method="POST" action="{{ route('cursos.comments.store', $course->id) }}">
    @csrf

    <div class="form-group">
        <label for="content">Comentario</label>
        <textarea class="form-control" name="content" id="content" rows="3" required></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Publicar Comentario</button>
</form>
