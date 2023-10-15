<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $query = Course::query();
    
        // Filtrar por tipo de curso si se proporciona uno válido
        if ($request->has('type') && in_array($request->input('type'), ['Matemáticas', 'Inglés', 'Lengua y Literatura'])) {
            $query->where('tipo', $request->input('type'));
        }
    
        // Búsqueda por título o descripción si se proporciona un término de búsqueda
        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->where(function ($q) use ($searchTerm) {
                $q->where('titulo', 'like', "%$searchTerm%")
                    ->orWhere('descripcion', 'like', "%$searchTerm%");
            });
        }
    
        // Obtén una lista paginada de los cursos con 4 cursos por página
        $courses = $query->paginate(4);
    
        // Obtén una lista de cursos populares ordenados por visualizaciones (si tienes este campo)
        $popularCourses = Course::orderByDesc('visualizaciones')->take(4)->get();

        if (!auth()->check()) {
            // El usuario no está autenticado, establece una variable de sesión
            session(['showRegistrationModal' => true]);
        }
    
        
        // Retorna la vista de cursos y pasa la lista de cursos paginada como variable
       return view('cursos.index', compact('courses', 'popularCourses'));
       // Retorna la vista de home  y pasa la lista de cursos paginada como variable
       return view('home', compact( 'popularCourses'));
        
    }
    // funcion para cursios populasres 
    public function search(Request $request)
    {
        $query = Course::query();
    
        if ($request->has('q')) {
            $searchTerm = $request->input('q');
            $query->where(function ($q) use ($searchTerm) {
                $q->where('titulo', 'like', "%$searchTerm%")
                    ->orWhere('descripcion', 'like', "%$searchTerm%");
            });
        }
    
        $courses = $query->paginate(4);
    
        // También obtén cursos populares aquí si es necesario
    
        return view('cursos.search', compact('courses'));
    }
    public function searchPopular(Request $request)
{
    $query = Course::query();

    // Búsqueda por título o descripción si se proporciona un término de búsqueda
    if ($request->has('q')) {
        $searchTerm = $request->input('q');
        $query->where(function ($q) use ($searchTerm) {
            $q->where('titulo', 'like', "%$searchTerm%")
              ->orWhere('descripcion', 'like', "%$searchTerm%");
        });
    }

    // Obtén cursos populares aquí
    $popularCourses = Course::orderByDesc('visualizaciones')->take(4)->get();

    // Puedes usar la misma vista que utilizas para mostrar cursos en la búsqueda regular,
    // o puedes crear una vista específica para la búsqueda de cursos populares.
    return view('cursos.search', compact('popularCourses'));
    return view('popular_courses', compact('popularCourses'));

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
        return view('cursos.show', compact('course'));

        // Retorna la vista de home y pasa la lista de cursos populares como variable
        return view('home', compact('popularCourses'));
    }
}
