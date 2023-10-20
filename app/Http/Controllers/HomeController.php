<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\ForumPost;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      //  return view('home');

      $comments = ForumPost::with('user', 'course')->orderBy('created_at', 'desc')->take(5)->get();
            $featuredCourses = Course::orderBy('stars', 'desc')->take(4)->get();
            $comments = ForumPost::with('user', 'course')->orderBy('created_at', 'desc')->take(5)->get();
           

             // Recupera el curso con el ID proporcionado
       
        
           // return view('home', ['featuredCourses' => $featuredCourses]);
           // return view('home', compact('comments'));
          return view('home', ['comments' => $comments, 'featuredCourses' => $featuredCourses]);
    }

    public function showProfile()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }
    

    public function show($id)
    {
        // Recupera el curso con el ID proporcionado
        $course = Course::find($id);

        if (!$course) {
            // Si el curso no se encuentra, puedes manejarlo apropiadamente, por ejemplo, mostrar una vista de error 404.
            abort(404, 'Curso no encontrado');
        }
            
        if (!auth()->check()) {
            // El usuario no está autenticado, establece una variable de sesión
            session(['showRegistrationModal' => true]);
        }
     
        // Retorna la vista de detalles del curso y pasa el curso como variable
        return view('home', compact('course'));

        // Retorna la vista de home y pasa la lista de cursos populares como variable
        return view('home', compact('popularCourses'));
        return view('cursos.index', compact('popularCourses'));
    }
}


