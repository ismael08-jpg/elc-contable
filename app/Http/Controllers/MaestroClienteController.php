<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\MaestroCliente;
use App\Models\Cliente;
use App\Models\Ventum;
use App\Models\Pais;
use App\Models\Estado;
use App\Models\Municipio;
use App\Models\Moneda;

class MaestroClienteController extends Controller
{
    public $contador;

    public function __construct()
    {
        $this->middleware('auth');
         
    }
    

    public function index(Request $request){  
        if ($request->session()->has('alerta') and $request->session()->get('contador') == 1)
            {
                $alerta = $request->session()->get('alerta');
                $request->session()->put('contador', 0);
                
            }
        else{
            $alerta = "no traia valor";
        }
        
        Auth::user()->autorizarRol([1]);

        $maestro = MaestroCliente::select('maestro_cliente.*', 'cliente.*')
        ->join('cliente', 'maestro_cliente.id_cliente', '=', 'cliente.id_cliente')
        ->get();

        $pais = Pais::select("*")->orderBy("nombre_pais")->get();
        

        $moneda = Moneda::select('codigo', 'nombre_moneda', 'simbolo')->orderBy('nombre_moneda')->get();
        $estado = Estado::all();
        $municipio = Municipio::all();
        return view('maestros.maestroCliente', compact('maestro', 'pais', 'moneda', 'estado', 'municipio', 'alerta'));
    }

    public function getEstados(Request $request){
        Auth::user()->autorizarRol([1,2]);

        if($request->ajax()){
            $estados = Estado::where('id_pais', '=', $request->paisId)->get();
            foreach($estados as $estados){
                $estadoArray[$estados->id] = $estados->nombre_estado;
            }

            return response()->json($estadoArray);

        }

    }

    public function getMunicipios(Request $request){
        Auth::user()->autorizarRol([1,2]);

        if($request->ajax()){
            $municipios = Municipio::where('id_estado', '=', $request->estadoId)->get();
            foreach($municipios as $municipios){
                $municipioArray[$municipios->id] = $municipios->nombre_municipio;
            }

            return response()->json($municipioArray);

        }
    }

    public function getParaiso(Request $request)
    {
        Auth::user()->autorizarRol([1,2]);
        if($request->ajax()){

            $paraiso = Pais::where('id', '=', $request->paisId)->get();
            
            foreach($paraiso as $paraiso){
                $paraisoArray[$paraiso->id] = $paraiso->paraiso_fiscal;
            }

            return response()->json($paraisoArray);

        }

    }

    public function getParaisoEstado(Request $request){
        Auth::user()->autorizarRol([1,2]);
        if($request->ajax()){

            $paraiso = Estado::where('id', '=', $request->estadoId)->get();
            
            foreach($paraiso as $paraiso){
                $paraisoArray[$paraiso->id] = $paraiso->paraiso_fiscal;
            }

            return response()->json($paraisoArray);

        }
    }


    public function store(Request $request){
        Auth::user()->autorizarRol([1]);

        if($request->pais == 55){
            $d = 16;
        } else{
            $d = 15;
        }

        $validacion = $request->validate([
            //'condiciones_credito' => 'required',
            'nombre_cliente' => 'required|max:50',
            'numero_cliente_icg' => 'required|max:50',
            //'numero_cliente' => 'required',
            'nombre_comercial' => 'required|max:50',

            'nombre_del_sujeto' => 'required|max:50',
            //'direccion' => 'required',
            'pais' =>'required|max:50',
            'codigo_pais' =>'required|max:50',
            'ciudad' =>'required|max:50',
            'departamento' =>'required|max:50',
            'municipio' =>'required|max:50',
            

            'telefono_fijo' =>'required|size:'.$d,

            //'pagina_web' =>'required',
            'correo' =>'email|required',
            
            //'telefono_celular' =>'size:'.$d,
           'paraiso_fiscal' =>'required',
            'nombre_contacto' =>'required',
            'telefono_contacto' =>'required|size:'.$d,
            'cargo_contacto' =>'required',
            //'pagina_web_contacto' =>
            'correo_contacto' =>'email|required',
            'moneda_principal' =>'required',
            'tipo_cambio' =>'required',
            'giro_fical_negocio' =>'required',
            'tipo_contribuyente' =>'required',
            'nit_niff' =>'required',
            'n_registro_fiscal' =>'required',
            'cobra_iva' =>'required',
            'entera_iva' =>'required',
            'porc_retencion' => 'required|numeric|min:0.00',
            'percepcion' =>'required',
            'cta_pasivo_uno' =>'required',
            //'cta_pasivo_dos' =>'required',
            'cta_activo_uno' =>'required',
             //'cta_activo_dos' =>
            'comision' => 'required|numeric|min:0.00',
            'emitira_nc' =>'required|max:2',
            //'condiciones_operacion' =>'required',
        ]);

       
        
        

        $cliente = new Cliente();

        $cliente->nombre_cliente = $request->nombre_cliente;
        $cliente->save();

        $maestro = new Maestrocliente();
        if($request->hasFile('condiciones_credito'))
        $maestro->condiciones_credito = $request->condiciones_credito;

        $maestro->id_cliente = $cliente->id_cliente;
        $maestro->numero_cliente_icg = $request->numero_cliente_icg;
        if($request->hasFile('numero_cliente'))
        $maestro->numero_cliente = $request->numero_cliente;
        $maestro->nombre_comercial = $request->nombre_comercial;
        $maestro->nombre_del_sujeto = $request->nombre_del_sujeto;

        if($request->hasFile('direccion'))
        $maestro->direccion = $request->direccion;

        $pai = Pais::select('nombre_pais')->where('id', '=', $request->pais)->first();
        $maestro->pais = $pai->nombre_pais;
        
        $maestro->codigo_pais = $request->codigo_pais;
        $maestro->ciudad = $request->ciudad;

        $dep = Estado::select('nombre_estado')->where('id', '=', $request->departamento)->first();
        $maestro->departamento = $dep->nombre_estado;

        $maestro->municipio = $request->municipio;
        
        $maestro->telefono_fijo = $request->telefono_fijo; //telefono
        $maestro->pagina_web = $request->pagina_web;
        $maestro->correo = $request->correo;
        if($request->hasFile('telefono_celular'))
        $maestro->paraiso_fiscal = $request->paraiso_fiscal;
        $maestro->nombre_contacto = $request->nombre_contacto;
        $maestro->cargo_contacto = $request->cargo_contacto;
        $maestro->telefono_contacto = $request->telefono_contacto; //telefono
        $maestro->pagina_web_contacto = $request->pagina_web_contacto;
        $maestro->correo_contacto = $request->correo_contacto;
        $maestro->moneda_principal = $request->moneda_principal;
        $maestro->tipo_cambio = $request->tipo_cambio;
        $maestro->giro_fical_negocio = $request->giro_fical_negocio;
        $maestro->tipo_contribuyente = $request->tipo_contribuyente;
        $maestro->nit_niff = $request->nit_niff;

        $maestro->n_registro_fiscal = $request->n_registro_fiscal;
        $maestro->cobra_iva = $request->cobra_iva;
        $maestro->entera_iva = $request->entera_iva;
        $maestro->porc_retencion = $request->porc_retencion;
        $maestro->percepcion = $request->percepcion;
        $maestro->cta_pasivo_uno = $request->cta_pasivo_uno;
        if($request->hasFile('cta_pasivo_dos'))
        $maestro->cta_pasivo_dos = $request->cta_pasivo_dos;
        $maestro->cta_activo_uno = $request->cta_activo_uno;
        if($request->hasFile('cta_activo_dos'))
        $maestro->cta_activo_dos = $request->cta_activo_dos;
        $maestro->comision = $request->comision;
        $maestro->emitira_nc = $request->emitira_nc;

        if($request->hasFile('ondiciones_operacion'))
        $maestro->condiciones_operacion = $request->condiciones_operacion;
        $maestro->save();

        $request->session()->put('alerta', 'create');
        $request->session()->put('contador', 1);
            
        //return $this->alert;
        return redirect()->route('maestroCliente.index');
        }






        public function update(Request $request){
            Auth::user()->autorizarRol([1]);

            $validacion = $request->validate([
                'fcondiciones_credito' => 'required',
                'fid_maestro_cliente' => 'required',
                'fid_cliente' => 'required',
                'fnombre_cliente' => 'required',
                'fnumero_cliente_icg' => 'required',
                //'numero_cliente' => 'required',
                'fnombre_comercial' => 'required',

                'fnombre_del_sujeto' => 'required',
                'fdireccion' => 'required',
                'fpais' =>'required',
                'fcodigo_pais' =>'required',
                'fciudad' =>'required',
                'fdepartamento' =>'required',
                'fmunicipio' =>'required',
                //'ftelefono_fijo' =>'required',
                'fpagina_web' =>'required',
                'fcorreo' =>'email|required',
                'ftelefono_celular' =>'required',
                'fparaiso_fiscal' =>'required',
                'fnombre_contacto' =>'required',
                'ftelefono_contacto' =>'required',
                'fcargo_contacto' =>'required',
                //'fpagina_web_contacto' =>
                'fcorreo_contacto' =>'email|required',
                'fmoneda_principal' =>'required',
                'ftipo_cambio' =>'required',
                'fgiro_fical_negocio' =>'required',
                'ftipo_contribuyente' =>'required',
                'fnit_niff' =>'required',
                'fn_registro_fiscal' =>'required',
                'fcobra_iva' =>'required',
                'fentera_iva' =>'required',
                'fporc_retencion' => 'required|numeric|min:0.00',
                'fpercepcion' =>'required',
                'fcta_pasivo_uno' =>'required',
                //'fcta_pasivo_dos' =>'required',
                'fcta_activo_uno' =>'required',
                 //'fcta_activo_dos' =>
                'fcomision' => 'required|numeric|min:0.00',
                'femitira_nc' =>'required',
                //'fcondiciones_operacion' =>'required',
            ]);

            $cliente = Cliente::find($request->fid_cliente);
            $cliente->nombre_cliente = $request->fnombre_cliente;
            $cliente->save();

            $maestro = Maestrocliente::find($request->fid_maestro_cliente);

            $maestro->condiciones_credito = $request->fcondiciones_credito;

            $maestro->id_cliente = $request->fid_cliente;
            $maestro->numero_cliente_icg = $request->fnumero_cliente_icg;
            $maestro->numero_cliente = $request->fnumero_cliente;
            $maestro->nombre_comercial = $request->fnombre_comercial;
            $maestro->nombre_del_sujeto = $request->fnombre_del_sujeto;
            $maestro->direccion = $request->fdireccion;
            $maestro->pais = $request->fpais;
            $maestro->codigo_pais = $request->fcodigo_pais;
            $maestro->ciudad = $request->fciudad;
            $maestro->departamento = $request->fdepartamento;
            $maestro->municipio = $request->fmunicipio;
            $maestro->telefono_fijo = $request->ftelefono_fijo;
            $maestro->pagina_web = $request->fpagina_web;
            $maestro->correo = $request->fcorreo;
            $maestro->telefono_celular = $request->ftelefono_celular;
            $maestro->paraiso_fiscal = $request->fparaiso_fiscal;
            $maestro->nombre_contacto = $request->fnombre_contacto;
            $maestro->cargo_contacto = $request->fcargo_contacto;
            $maestro->telefono_contacto = $request->ftelefono_contacto;
            $maestro->pagina_web_contacto = $request->fpagina_web_contacto;
            $maestro->correo_contacto = $request->fcorreo_contacto;
            $maestro->moneda_principal = $request->fmoneda_principal;
            $maestro->tipo_cambio = $request->ftipo_cambio;
            $maestro->giro_fical_negocio = $request->fgiro_fical_negocio;
            $maestro->tipo_contribuyente = $request->ftipo_contribuyente;
            $maestro->nit_niff = $request->fnit_niff;

            $maestro->n_registro_fiscal = $request->fn_registro_fiscal;
            $maestro->cobra_iva = $request->fcobra_iva;
            $maestro->entera_iva = $request->fentera_iva;
            $maestro->porc_retencion = $request->fporc_retencion;
            $maestro->percepcion = $request->fpercepcion;
            $maestro->cta_pasivo_uno = $request->fcta_pasivo_uno;
            $maestro->cta_pasivo_dos = $request->fcta_pasivo_dos;
            $maestro->cta_activo_uno = $request->fcta_activo_uno;
            $maestro->cta_activo_dos = $request->fcta_activo_dos;
            $maestro->comision = $request->fcomision;
            $maestro->emitira_nc = $request->femitira_nc;

            $maestro->condiciones_operacion = $request->fcondiciones_operacion;
            $maestro->save();

            $request->session()->put('alerta', 'update');
            $request->session()->put('contador', 1);
        
            //return $this->alert;
            return redirect()->route('maestroCliente.index');
        }

        public function destroy(Request $request){
            Auth::user()->autorizarRol([1]);

            $validacion = $request->validate([
                'did_maestro_cliente' => 'required',
                'did_cliente' => 'required',
            ]);

            $ventasCliente = Ventum::where("id_cliente", '=', $request->did_cliente )->get();

            //Validamos que no tengan ventas ligaddas
            if($ventasCliente->count() == 0){

                $maestro = Maestrocliente::find($request->did_maestro_cliente);
                $maestro->delete();

                $cliente = Cliente::find($request->did_cliente);
                $cliente->delete();

                

                $request->session()->put('alerta', 'delete');
                $request->session()->put('contador', 1);

            }else
            {
                $request->session()->put('alerta', 'deleteError');
                $request->session()->put('contador', 1);
            }

            return redirect()->route('maestroCliente.index');
        }


}
