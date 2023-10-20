<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\ForumPost;

class CourseController extends Controller

{

    
    public function index(Request $request)
    {
        $query = Course::query();
    
        // Filtrar por tipo de curso si se proporciona uno válido
        if ($request->has('type') && in_array($request->input('type'), ['Matemáticas', 'idiomas', 'Educacion', 'programacion'])) {
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
        $course = Course::with('comments')->find($id);
       
    if (!$course) {
        abort(404, 'Curso no encontrado');
    }

  
        if (!$course) {
            // Si el curso no se encuentra, puedes manejarlo apropiadamente, por ejemplo, mostrar una vista de error 404.
            abort(404, 'Curso no encontrado');
        }
              // Carga los comentarios relacionados con el curso
    $course->load('comments');
  // Recupera el curso con los comentarios y los usuarios relacionados
  $course = Course::with('forumPosts.user')->find($id);
        
        if (!auth()->check()) {
            // El usuario no está autenticado, establece una variable de sesión
            session(['showRegistrationModal' => true]);
        }
     
        // Retorna la vista de detalles del curso y pasa el curso como variable
        return view('cursos.show', compact('course'));

        // Retorna la vista de home y pasa la lista de cursos populares como variable
        return view('home', compact('popularCourses'));
        return view('cursos.show', compact('course'));
    }

    public function viewClasses($id)
{
    // Recupera el curso con el ID proporcionado
    $course = Course::find($id);
    $course = Course::with('evaluations')->find($id);


    if (!$course) {
        abort(404, 'Curso no encontrado');
    }
    
    // Recupera las lecciones relacionadas con el curso
    $lesson = $course->lesson;
   
    // Carga las evaluaciones relacionadas con el curso
    $course->load('evaluations');
    
    return view('cursos.clases', compact('course', 'lesson'));
    // Obtén el valor de $cursoId desde el curso
    $cursoId = $course->id;

    // Retorna la vista de clases y pasa el valor de $cursoId como variable
    return view('cursos.clases', ['cursoId' => $cursoId, 'course' => $course]);
}
public function showClasses($lessonId)
{
    $lesson = Lesson::find($lessonId);

    // Verifica si la lección fue encontrada
    if (!$lesson) {
        abort(404); // Puedes mostrar una vista de error 404
    }

    return view('cursos.clases', compact('lesson'));

}

public function store(Request $request) {
    // Valida los datos del formulario de creación de publicación
    $request->validate([
        'title' => 'required',
        'content' => 'required',
    ]);

    // Crea una nueva publicación
    $post = new ForumPost();
    $post->title = $request->input('title');
    $post->content = $request->input('content');
    $post->user_id = auth()->user()->id; // Asigna el ID del usuario actual
    $post->save();

    return redirect()->route('cursos.clases')->with('success', 'Publicación creada con éxito');
}
        
public function storeComment(Request $request, $courseId)
{
    // Valida los datos del formulario de creación de publicación
    $request->validate([
        'content' => 'required',
    ]);

    // Crea un nuevo comentario asociado al curso
    $post = new ForumPost();
    $post->content = $request->input('content');
    $post->user_id = auth()->user()->id;
    $post->course_id = $courseId; // Asigna el ID del curso al comentario
    $post->save();
    
    return redirect()->route('cursos.show', $courseId)->with('success', 'Comentario creado con éxito');


}


public function viewClassesByModule($courseId, $moduleId)
{
    // Nuevo método viewClassesByModule aquí
    $course = Course::find($courseId);

    // Recupera el curso y sus módulos (asegúrate de ajustar esto según tu estructura de datos)
    $course = Course::find($courseId);
    $modules = $course->modules;

    if (!$course) {
        abort(404, 'Curso no encontrado');
    }

    // Recupera el módulo actual
    $module = $course->modules()->where('id', $moduleId)->first();

    if (!$module) {
        abort(404, 'Módulo no encontrado');
    }

    // Recupera la URL del video relacionado con el módulo
    $videoUrl = $module->resources()->where('tipo', 'video')->value('url');

    return view('cursos.clases', compact('course', 'module', 'videoUrl'));
}

}
