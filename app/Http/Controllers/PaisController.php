<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Ventum;
use App\Models\Pais;

class PaisController extends Controller
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

        $pais = Pais::select('*')->orderBy('nombre_pais')->get();

        return view('pais.pais', compact('alerta', 'pais'));
    }


    public function update(Request $request){
        Auth::user()->autorizarRol([1]);

        $validacion = $request->validate([
            'id' => 'required|numeric',
            'codigo' => 'required|max:50',
            'paraiso_fiscal' => 'required|max:2',
            
        ]);

        $pais = Pais::find($request->id);

        $pais->codigo = $request->codigo;
        $pais->paraiso_fiscal = $request->paraiso_fiscal;
        $pais->save();
        
        //alertas
        $request->session()->put('alerta', 'update');
        $request->session()->put('contador', 1);

        return redirect()->route('pais.index');
    }



    //ajax de pais
    public function getCodigoPais(Request $request){

        Auth::user()->autorizarRol([1,2]);
        if($request->ajax()){

            $paraiso = Pais::where('id', '=', $request->paisId)->get();
            
            foreach($paraiso as $paraiso){
                $codigoArray[$paraiso->id] = $paraiso->codigo;
            }

            return response()->json($codigoArray);

        }
    }

    //ajax de pais
    public function getCodigo(Request $request){

        Auth::user()->autorizarRol([1,2]);
        if($request->ajax()){

            $paraiso = Pais::where('nombre_pais', '=', $request->pais)->get();
            
            foreach($paraiso as $paraiso){
                $codigoArray[$paraiso->id] = $paraiso->codigo;
            }

            return response()->json($codigoArray);

        }
    }


}
