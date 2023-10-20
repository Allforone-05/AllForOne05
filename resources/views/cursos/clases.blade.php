<html>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/stylo.css') }}">
    <link rel="stylesheet" href="{{ asset('node_modules/bootstrap/dist/css/bootstrap.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    @extends('layouts.app')

    @section('content')
        <div class="container miApp">
            <h1>Clases de {{ $course->titulo }}</h1>
         
            <div class="card mb-3 ">
                <img src="{{ asset($course->imagen) }}" alt="{{ $course->titulo }}" class="card-img-top">
            </div>
            <div class="content-section">
                <hr>
                  <h4></h4>
<div class="row"> 
    <div class="col-md-12 col-12" id="resource-container"></div>
</div>
                 
                  
                </div>
                   <br>
                <div class="container">
                    <div class="row">
                         <div class="col-md-8">
                            <div class="evaluation-section">
                                <h2 class="text-dark">Evaluación</h2>
                                <ul>
                                    @foreach ($course->evaluations as $evaluation)
                                        <li>
                                            <h3>-{{ $evaluation->nombre }}</h3>
                                            <p>*{{ $evaluation->descripcion }}</p>
                                            <a href="{{ $evaluation->enlace }}" target="_blank">Tomar evaluación</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <!-- Módulos y recursos a la derecha -->
                            <div class="module-sidebar">
                                <h1>{{ $course->titulo }}</h1>
                                @foreach ($course->modules as $module)
                                    <h4>{{ $module->titulo }}</h4>
                                    <ul>
                                        @foreach ($module->resources as $resource)
                                        
                                            <li>
                                                @if ($resource->tipo === 'video')
                                                    <i class="fas fa-film"></i>
                                                    <a href="#" class="resource-link" data-url="{{ $resource->url }}" data-tipo="{{ $resource->tipo }}">
                                                        {{ $resource->nombre }}
                                                    </a>
                                                @elseif ($resource->tipo === 'pdf')
                                                    <i class="far fa-file-pdf"></i>
                                                    <a href="#" class="resource-link" data-url="{{ $resource->url }}" data-tipo="{{ $resource->tipo }}">
                                                        {{ $resource->nombre }}
                                                    </a>
                                                @else
                                                    <i class="fas fa-file"></i>
                                                @endif
                                                {{ $resource->nombre }}
                                            </li>
                                        @endforeach
                                    </ul>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            </div>
            
            <hr>
           

          
            <h2>Evaluaciones Relacionadas</h2>
            <ul>
                @if ($lesson)
                @foreach ($lesson->evaluations as $evaluation)
                    <li>
                        <a href="{{ route('evaluations.show', $evaluation->id) }}">
                            {{ $evaluation->nombre }}
                        </a>
                    </li>
                @endforeach
            </ul>
            @endif
             <!-- Mostrar el contenido de la lección solo si $lesson existe -->
            @if ($lesson)
              <div class="container">
               <h1>{{ $lesson->title }}</h1>
               @if ($lesson->video_url)
                <!-- Reproductor de video -->
                <video controls width="600">
                    <source src="{{ $lesson->video_url }}" type="video/mp4">
                    Tu navegador no admite la reproducción de videos.
                </video>

              @endif
            @endif
        

            @if ($lesson)
               <p>{{ $lesson->description }}</p>
            <!-- Formulario para dejar un comentario y calificación -->
              <form method="POST" action="{{ route('ratings.store', $lesson->id) }}">
                @csrf
                <label for="value">Calificación (de 1 a 5):</label>
                <input type="number" name="value" min="1" max="5" required>
                <textarea name="comment" placeholder="Deja tu comentario"></textarea>
                <button type="submit">Enviar</button>
              </form>
              @endif
            <!-- Mostrar comentarios y calificaciones existentes -->
            calificaciones
            @if ($lesson)
            <div class="comments">
                @foreach ($lesson->ratings as $rating)
                    <div class="comment">
                        <p>Calificación: {{ $rating->value }}</p>
                        <p>Comentario: {{ $rating->comment }}</p>
                    </div>
                @endforeach
                @endif
            </div>
          </div>
          <!-- Vista del foro donde deseas mostrar las publicaciones y respuestas -->
         
 </div>

 <script>
    $(document).ready(function() {
        $(".resource-link").click(function(e) {
            e.preventDefault();
            
            // Obtener la URL y el tipo del recurso
            var url = $(this).data("url");
            var tipo = $(this).data("tipo");

            // Vaciar el contenedor de recursos
            $("#resource-container").empty();

            // Cargar el recurso en el contenedor
            if (tipo === 'video' && url.indexOf('youtube.com') !== -1) {
                // Reproductor de video de YouTube
                var videoEmbedCode = '<iframe width="100%"  src="' + url + '" frameborder="0" allowfullscreen></iframe>';
                $("#resource-container").html(videoEmbedCode);
            } else if (tipo === 'pdf' || tipo === 'texto') {
                // Embeber documento PDF o archivo de texto
                var embedCode = '<iframe src="' + url + '" width="100%" ></iframe>';
                $("#resource-container").html(embedCode);
            } else {
                // Otro tipo de recurso
                $("#resource-container").text("Recurso no compatible");
            }
        });
    });
</script>
<style>
.video-container {
    position: relative;
    padding-bottom: 56.25%; /* Proporción 16:9 */
    height: 0;
}

.video-container video {
    position: absolute;
    width: 100%;
    height: 100%;
}

#resource-container{

}
/* Estilo para hacer que los PDF sean responsivos */
iframe[src*="pdf"] {
    width: 100%;
    height: 400px; /* Ajusta la altura según tus necesidades */
}

/* Estilo adicional para mejorar la apariencia en dispositivos móviles si es necesario */
@media (max-width: 768px) {
    .video-container {
        padding-bottom: 75%; /* Puedes ajustar esta proporción según tus necesidades */
    }

    iframe[src*="pdf"] {
        height: 300px; /* Ajusta la altura para dispositivos móviles */
    }
    .video-container video {
    position: absolute;
    width: 50%;
    height: 50%;
}
}
</style>
       
    @endsection
        </body>
</html>    
















