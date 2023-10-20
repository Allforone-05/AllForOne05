<?php

namespace App\Http\Controllers;
use App\Models\Article;
use App\Models\Course;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
{
    $articles = Article::all();
    return view('articles.index', compact('articles'));
}

public function show($id)
{
    $article = Article::findOrFail($id);

    if (!$article) {
        abort(404, 'Artículo no encontrado');
    }

    // Obtén cursos relacionados en función del campo course_type del artículo actual
    $relatedCourses = Course::where('tipo', $article->course_type)->get();

    return view('articles.show', compact('article', 'relatedCourses'));
}

}
