use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegistroController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/perfil'; // Cambia esto según tu ruta de redirección deseada

    public function showRegistrationForm()
    {
        return view('auth.register'); // Asegúrate de que tu vista de registro esté en el lugar correcto
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}

