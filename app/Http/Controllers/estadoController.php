<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estado;
use App\Models\Pais;
use Illuminate\Support\Facades\Auth;


class estadoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    
    }

    public function index (Request $request){  
        Auth::user()->autorizarRol([1]);

        //validación para que las alertas se muestren solo una
        if ($request->session()->has('alerta') and $request->session()->get('contador') == 1)
            {
                $alerta = $request->session()->get('alerta');
                $request->session()->put('contador', 0);
                
            }
        else{
            $alerta = "no traia valor";
        }


        

        $estado = Estado::select('pais.nombre_pais', 'estado.*')
        ->join('pais', 'pais.id', '=', 'estado.id_pais')
        ->orderBy('nombre_estado')
        ->get();


        return view('estado.estado', compact('alerta', 'estado'));
    }


    public function update(Request $request){
        Auth::user()->autorizarRol([1]);

        $validacion = $request->validate([
            'id' => 'required|numeric',
            'paraiso_fiscal' => 'required|max:2',
            
        ]);

        $estado = Estado::find($request->id);

        
        $estado->paraiso_fiscal = $request->paraiso_fiscal;
        $estado->save();
        
        //alertas
        $request->session()->put('alerta', 'update');
        $request->session()->put('contador', 1);

        return redirect()->route('estado.index');
    }

}
