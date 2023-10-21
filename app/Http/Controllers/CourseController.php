<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\ForumPost;
use Illuminate\Support\Facades\DB; // Importa la clase DB

class CourseController extends Controller
{
    public function index(Request $request)
    {
        // Genera una clave de caché única basada en los parámetros de la solicitud
        $cacheKey = 'course_index_' . md5(serialize($request->all()));
             //Cache::remember función 
        // Recupera la lista de cursos desde la caché o la base de datos
        $courses = Cache::remember($cacheKey, now()->addMinutes(30), function () use ($request) {
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

            return $query->paginate(4);
        });

        // Obtén una lista de cursos populares ordenados por visualizaciones (si tienes este campo)
        $popularCourses = Cache::remember('popular_courses', now()->addMinutes(30), function () {
            return Course::orderByDesc('visualizaciones')->take(4)->get();
        });

        if (!auth()->check()) {
            // El usuario no está autenticado, establece una variable de sesión
            session(['showRegistrationModal' => true]);
        }

        // Retorna la vista de cursos y pasa la lista de cursos paginada y populares como variables
        return view('cursos.index', compact('courses', 'popularCourses'));
    }

    public function show($id)
    {
        // Genera una clave de caché única para el detalle de un curso
        $cacheKey = 'course_show_' . $id;

        // Recupera el detalle del curso desde la caché o la base de datos
        $course = Cache::remember($cacheKey, now()->addMinutes(30), function () use ($id) {
            return Course::with('comments', 'forumPosts.user')->find($id);
        });

        if (!$course) {
            abort(404, 'Curso no encontrado');
        }

        if (!auth()->check()) {
            // El usuario no está autenticado, establece una variable de sesión
            session(['showRegistrationModal' => true]);
        }

        // Retorna la vista de detalles del curso y pasa el curso como variable
        return view('cursos.show', compact('course'));
    }

    public function search(Request $request)
    {
        // Término de búsqueda ingresado por el usuario
        $searchTerm = $request->input('search');
    
        /* estoy utilizando  una consulta preparada con el método DB::table. Esto protege contra la inyección 
         SQL y es más seguro.  */


        $courses = DB::table('courses')
            ->where('titulo', 'LIKE', '%' . $searchTerm . '%')
            ->orWhere('descripcion', 'LIKE', '%' . $searchTerm . '%')
            ->get();
    
        return view('cursos.search', compact('courses'));
    }
    
    public function searchPopular(Request $request)
    {
        $query = Course::query();

        if ($request->has('q')) {
            $searchTerm = $request->input('q');
            $query->where(function ($q) use ($searchTerm) {
                $q->where('titulo', 'like', "%$searchTerm%")
                  ->orWhere('descripcion', 'like', "%$searchTerm%");
            });
        }

        $popularCourses = Cache::remember('popular_courses', now()->addMinutes(30), function () {
            return Course::orderByDesc('visualizaciones')->take(4)->get();
        });

        return view('cursos.search', compact('popularCourses'));
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
    }

    public function showClasses($lessonId)
    {
        $lesson = Lesson::find($lessonId);

        if (!$lesson) {
            abort(404);
        }

        return view('cursos.clases', compact('lesson'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

    
        $post = new ForumPost();
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->user_id = auth()->user()->id;
        $post->save();

        return redirect()->route('cursos.clases')->with('success', 'Publicación creada con éxito');
    }

    public function storeComment(Request $request, $courseId)
    {
        $request->validate([
            'content' => 'required',
        ]);

        $post = new ForumPost();
        $post->content = $request->input('content');
        $post->user_id = auth()->user()->id;
        $post->course_id = $courseId;
        $post->save();

        return redirect()->route('cursos.show', $courseId)->with('success', 'Comentario creado con éxito');
    }

    public function viewClassesByModule($courseId, $moduleId)
    {
        $course = Course::find($courseId);
        $course = Course::with('modules')->find($courseId);

        if (!$course) {
            abort(404, 'Curso no encontrado');
        }

        $module = $course->modules()->where('id', $moduleId)->first();

        if (!$module) {
            abort(404, 'Módulo no encontrado');
        }

        $videoUrl = $module->resources()->where('tipo', 'video')->value('url');

        return view('cursos.clases', compact('course', 'module', 'videoUrl'));
    }
}


