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
Route::get('/informacion', 'App\Http\Controllers\InformationController@index')->name('informacion');
Route::get('/soluciones', 'App\Http\Controllers\SolutionController@index')->name('soluciones');
Route::get('/premium', 'App\Http\Controllers\PremiumController@index')->name('premium');
Route::get('/foro', 'App\Http\Controllers\ForumController@index')->name('foro');
Route::get('/clases', 'App\Http\Controllers\ClassController@index')->name('clases');

Route::middleware(['web'])->group(function () {
    Route::get('/cursos', 'App\Http\Controllers\CourseController@index')->name('cursos.index');
    Route::get('/cursos/{id}', 'App\Http\Controllers\CourseController@show')->name('cursos.show');

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

