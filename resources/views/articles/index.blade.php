
<html>
<body>


@extends('layouts.app')

@section('content')
<br>
<br>
<div class="container miApp">
  
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                @foreach($articles as $article)
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <img src="{{ asset($article->imagen) }}" alt="{{ $article->title }}" class="card-img-top">
                        <div class="card-body">
                            <h2 class="card-title">{{ $article->title }}</h2>
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