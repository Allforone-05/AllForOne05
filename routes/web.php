<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistroController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/registro', 'RegistroController@showRegistrationForm')->name('registro');
Route::get('/perfil', 'App\Http\Controllers\UserController@profile')->name('profile');  
Route::put('/profile/update', 'App\Http\Controllers\ProfileController@update')->name('profile.update');

/* /******* */ 
Route::get('/informacion', 'App\Http\Controllers\InformationController@index')->name('informacion.index');
Route::get('/soluciones', 'App\Http\Controllers\SolutionController@index')->name('soluciones');
Route::get('/premium', 'App\Http\Controllers\PremiumController@index')->name('premium');
Route::get('/foro', 'App\Http\Controllers\ForumController@index')->name('foro');
Route::get('/clases', 'App\Http\Controllers\ClassController@index')->name('clases');

Route::middleware(['web'])->group(function () {
    Route::get('/cursos', 'App\Http\Controllers\CourseController@index')->name('cursos.index');
    Route::get('/cursos/{id}', 'App\Http\Controllers\CourseController@show')->name('cursos.show');
    Route::get('/cursos/{curso}/clases', 'App\Http\Controllers\CourseController@viewClasses')->name('cursos.clases');
    
Route::get('/cursos/{course}/clases', 'App\Http\Controllers\CourseController@viewClasses')
->name('cursos.clases');
});



Route::get('/faq', 'App\Http\Controllers\FaqController@index')->name('faq');

Route::get('/preguntas-frecuentes', 'App\Http\Controllers\FaqController@index')->name('faq');

   //Rutas de politicas de privacidad.
Route::get('/politica-privacidad', function () {
    return view('politica_privacidad'); // Crea una vista llamada 'politica_privacidad.blade.php'
})->name('politica_privacidad');

Route::get('/terminos-de-uso', function () {
    return view('terminos_uso'); // Crea una vista llamada 'terminos_uso.blade.php'
})->name('terminos_uso');

// Rutas paar contacto con soporte.
//Route::get('/contacto', [ContactController::class, 'show'])->name('contact.show');
//Route::post('/contacto/enviar', [ContactController::class, 'send'])->name('contact.send');
Route::get('/contact', 'App\Http\Controllers\ContactController@show')->name('contact.show');
Route::post('/contact/send', 'App\Http\Controllers\ContactController@send')->name('contact.send');


// routes/web para el foro 
Route::get('/foro', 'App\Http\Controllers\ForoController@index')->name('foro.index');
Route::post('/foro/publicar', 'App\Http\Controllers\ForoController@publicar')->name('foro.publicar');
Route::post('/foro/megusta/{id}', 'App\Http\Controllers\ForoController@megusta')->name('foro.megusta');
Route::post('/foro/responder/{id}', 'App\Http\Controllers\ForoController@responder')->name('foro.responder');


// routes/web para Articulos 
Route::get('/articles', 'App\Http\Controllers\ArticleController@index')->name('articles.index');
Route::get('/articles/{id}', 'App\Http\Controllers\ArticleController@show')->name('articles.show');


Route::get('/cursos/{lessonId}/clases', 'App\Http\Controllers\CourseController@viewClasses')->name('cursos.clases');
Route::get('cursos/{id}/clases', 'App\Http\Controllers\CourseController@viewClasses');

// foro de los cursos especifico 
Route::post('/foro/publicar', 'App\Http\Controllers\ForumPostController@store')->name('forum.post.create');
Route::post('/foro/responder/{postId}', 'App\Http\Controllers\ForumPostReplyController@store')->name('forum.post.reply');
Route::post('/cursos/{curso}/clases/foro/publicar', 'App\Http\Controllers\ForumPostController@store')->name('forum.posts.store');


Route::post('/lessons/{lessonId}/rate', 'App\Http\Controllers\RatingController@store')->name('lessons.rate');
Route::post('/lessons/{lessonId}/comment', 'App\Http\Controllers\CommentController@store')->name('lessons.comment');

Route::resource('evaluaciones', 'App\Http\Controllers\EvaluacionController');
Route::get('/evaluaciones', 'App\Http\Controllers\EvaluacionController@index'); // Mostrar evaluaciones disponibles
Route::get('/evaluaciones/{evaluacion}', 'App\Http\Controllers\EvaluacionController@show'); // Mostrar una evaluación individual
Route::post('/evaluaciones/{evaluacion}', 'App\Http\Controllers\EvaluacionController@store'); // Procesar evaluación

Route::get('/evaluations', 'App\Http\Controllers\EvaluaciónController@index');

Route::resource('trabajos-resumenes', 'App\Http\Controllers\TrabajoResumenController');
// routes/web.php


// Mostrar el formulario para cargar nuevos trabajos y resúmenes
Route::get('/trabajos_resumenes/create', 'App\Http\Controllers\TrabajoResumenController@create')->name('trabajos_resumenes.create');

// Procesar la carga de nuevos trabajos y resúmenes
Route::post('/trabajos_resumenes', 'App\Http\Controllers\TrabajoResumenController@store')->name('trabajos_resumenes.store');


// Mostrar detalles de un trabajo o resumen individual
Route::get('/trabajos_resumenes/{trabajoResumen}', 'App\Http\Controllers\TrabajoResumenController@show')->name('trabajos_resumenes.show');


Route::get('/evaluations/{evaluation}', 'App\Http\Controllers\EvaluationController@show')->name('evaluations.show');
Route::get('/evaluations', 'App\Http\Controllers\EvaluationController@index')->name('evaluations.index');


Route::post('/cursos/{course}/comments', 'App\Http\Controllers\CourseController@storeComment')->name('cursos.comments.store');


