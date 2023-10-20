
<html>
<body>


@extends('layouts.app')

@section('content')
<br>

<div class="container miApp">
     <span>Inicio>Articulos</span>
    <h5>Explora nuestros articulos de educacion,idiomas y mas</h5>
    <div class="row">
        
        <div class="col-md-8">
            <div class="row">
                @foreach($articles as $article)
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <img src="{{ asset($article->imagen) }}" alt="{{ $article->title }}" class="card-img-top">
                        <div class="card-body">
                            <h4 class="card-title">{{ $article->title }}</h4>
                            
                            <p class="card-text">{{ $article->created_at->format('d/m/Y') }}</p>
                            <a href="{{ route('articles.show', $article->id) }}" class="btn btn-primary">Leer más</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="col-md-4">
            <!-- Contenido relacionado o anuncios aquí -->
        </div>
    </div>
</div>
<br><br>
@endsection

</body>
</html>