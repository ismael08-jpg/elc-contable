<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;
use App\Models\TiposUsuario;

class UsuariosController extends Controller
{
    public $contador;

    public function __construct()
    {
        $this->middleware('auth');
         
    }



    public function index(Request $request){
 
        Auth::user()->autorizarRol([1]);

        if ($request->session()->has('alerta') and $request->session()->get('contador') == 1)
            {
                $alerta = $request->session()->get('alerta');
                $request->session()->put('contador', 0);
                
            }
        else{
            $alerta = "no traia valor";
        }

        $usuarios = Usuario::all();
        $tipos = TiposUsuario::all();
        
        return view('usuarios.usuarios', compact('usuarios', 'tipos', 'alerta'));;
    }





    public function update(Request $request){
        Auth::user()->autorizarRol([1]);

        $validacion = $request->validate([
            'id' => 'required|numeric',
            'nombre' => 'required',
            'usuario' => 'required',
            'email' => 'required|email|unique:usuarios,email,'.$request->id,
            'tipo_usuario' => 'required|numeric|in:2,1',
        ]);

        $usuarios = Usuario::find($request->id);
        $usuarios->nombre = $request->nombre;
        $usuarios->usuario = $request->usuario;
        $usuarios->tipo_usuario= $request->tipo_usuario;
        $usuarios->email = $request->email;
        $usuarios->save();

        $request->session()->put('alerta', 'update');
        $request->session()->put('contador', 1);
   
        return redirect()->route('usuarios.index');

    }
}
