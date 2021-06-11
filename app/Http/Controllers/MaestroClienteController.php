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
            'condiciones_credito' => 'max:200',
            'nombre_cliente' => 'required|max:100',
            'numero_cliente_icg' => 'max:50',
            'numero_cliente' => 'max:50',
            'nombre_comercial' => 'required|max:100',
            'nombre_del_sujeto' => 'max:50',
            'direccion' => 'max:50',
            'pais' =>'max:50',
            'codigo_pais' =>'max:50',
            'ciudad' =>'max:50',
            'departamento' =>'max:50',
            'municipio' =>'max:50',
            'telefono_fijo' =>'max:'.$d,
            'pagina_web' =>'max:200',
            'correo' =>'nullable|email|max:50',
            'telefono_celular' =>'|max:'.$d,
            'paraiso_fiscal' =>'max:50',
            'nombre_contacto' =>'max:50',
            'telefono_contacto' =>'|max:'.$d,
            'cargo_contacto' =>'max:50',
            'pagina_web_contacto' => 'max:50',
            'correo_contacto' =>'nullable|email|max:50',
            'moneda_principal' =>'max:50',
            'tipo_cambio' =>'max:50',
            'giro_fical_negocio' =>'max:50',
            'tipo_contribuyente' =>'max:50',
            'nit_niff' =>'max:50',
            'n_registro_fiscal' =>'max:50',
            'cobra_iva' =>'max:50',
            'entera_iva' =>'max:50',
            'porc_retencion' => 'required|numeric|min:0.00',
            'percepcion' =>'max:50',
            'cta_pasivo_uno' =>'max:50',
            'cta_pasivo_dos' =>'max:50',
            'cta_activo_uno' =>'max:50',
             'cta_activo_dos' => 'max:50',
            'comision' => 'required|numeric|min:0.00',
            'emitira_nc' =>'max:2',
            'condiciones_operacion' =>'max:200',
        ]);

       
        
        

        $cliente = new Cliente();
        $cliente->nombre_cliente = $request->nombre_cliente;
        $cliente->save();

        


        MaestroCliente::create(array_merge($validacion, ['id_cliente' => $cliente->id_cliente]));


        $request->session()->put('alerta', 'create');
        $request->session()->put('contador', 1);
            
        //return $this->alert;
        return redirect()->route('maestroCliente.index');
    }
    






        public function update(Request $request){
            Auth::user()->autorizarRol([1]);

            

            if($request->pais == "Estados Unidos"){
                $d = 16;
            } else{
                $d = 15;
            }

            //Si no pasa las validaciones queremos que abra el modal XD
            $request->session()->put('alerta', 'modal');
            $request->session()->put('contador', 1);
    

            $validacion = $request->validate([
                'fcondiciones_credito' => 'max:200',//-----------
                'fid_maestro_cliente' => 'required',
                'fid_cliente' => 'required',
                'fnombre_cliente' => 'required|max:100',
                'fnumero_cliente_icg' => 'max:50',
                'numero_cliente' => 'max:50', //----
                'fnombre_comercial' => 'required|max:100',

                'fnombre_del_sujeto' => 'max:50',
                'fdireccion' => 'max:200', //---------------
                'fpais' =>'max:50',
                'fcodigo_pais' =>'max:50',
                'fciudad' =>'max:50',
                'fdepartamento' =>'max:50',
                'fmunicipio' =>'max:50',
                'ftelefono_fijo' =>'max:'.$d, 
                'fpagina_web' =>'max:200', //----------------------
                'fcorreo' =>'nullable|email|max:50',
                'ftelefono_celular' =>'max:'.$d,// ------------------------
                'fparaiso_fiscal' =>'max:50',
                'fnombre_contacto' =>'max:50',
                'ftelefono_contacto' =>'max:'.$d,
                'fcargo_contacto' =>'max:50',
                'fpagina_web_contacto' => 'max:200', ///-----------------
                'fcorreo_contacto' =>'nullable|email|max:50',
                'fmoneda_principal' =>'max:50',
                'ftipo_cambio' =>'max:50',
                'fgiro_fical_negocio' =>'max:50',
                'ftipo_contribuyente' =>'max:50',
                'fnit_niff' =>'max:50',
                'fn_registro_fiscal' =>'max:50',
                'fcobra_iva' =>'max:2',
                'fentera_iva' =>'max:2',
                'fporc_retencion' => 'required|numeric|min:0.00',
                'fpercepcion' =>'max:50',
                'fcta_pasivo_uno' =>'max:50',
                'fcta_pasivo_dos' =>'max:50',//-----------
                'fcta_activo_uno' =>'max:50',
                'fcta_activo_dos' =>'max:50',//-----------
                'fcomision' => 'required|numeric|min:0.00',
                'femitira_nc' =>'max:50',
                'fcondiciones_operacion' =>'max:200',//-----------
            ]);

            $cliente = Cliente::find($request->fid_cliente);
            $cliente->nombre_cliente = $request->fnombre_cliente;
            $cliente->save();

            
            $maestro = Maestrocliente::find($request->fid_maestro_cliente);

            if($request->has('fcondiciones_credito'))
            $maestro->condiciones_credito = $request->fcondiciones_credito;
            $maestro->id_cliente = $request->fid_cliente;
            if($request->has('fnumero_cliente_icg'))
            $maestro->numero_cliente_icg = $request->fnumero_cliente_icg;
            if($request->has('fnumero_cliente'))
            $maestro->numero_cliente = $request->fnumero_cliente;
            if($request->has('fnombre_comercial'))
            $maestro->nombre_comercial = $request->fnombre_comercial;
            if($request->has('fnombre_del_sujeto'))
            $maestro->nombre_del_sujeto = $request->fnombre_del_sujeto;
            if($request->has('fdireccion'))
            $maestro->direccion = $request->fdireccion;
            if($request->has('fpais'))
            $maestro->pais = $request->fpais;
            if($request->has('fcodigo_pais'))
            $maestro->codigo_pais = $request->fcodigo_pais;
            if($request->has('fciudad'))
            $maestro->ciudad = $request->fciudad;
            if($request->has('fdepartamento'))
            $maestro->departamento = $request->fdepartamento;
            if($request->has('fmunicipio'))
            $maestro->municipio = $request->fmunicipio;
            if($request->has('ftelefono_fijo'))
            $maestro->telefono_fijo = $request->ftelefono_fijo;
            if($request->has('fpagina_web'))
            $maestro->pagina_web = $request->fpagina_web;
            if($request->has('fcorreo'))
            $maestro->correo = $request->fcorreo;
            if($request->has('ftelefono_celular'))
            $maestro->telefono_celular = $request->ftelefono_celular;
            if($request->has('fparaiso_fiscal'))
            $maestro->paraiso_fiscal = $request->fparaiso_fiscal;
            if($request->has('fnombre_contacto'))
            $maestro->nombre_contacto = $request->fnombre_contacto;
            if($request->has('fcargo_contacto'))
            $maestro->cargo_contacto = $request->fcargo_contacto;
            if($request->has('ftelefono_contacto'))
            $maestro->telefono_contacto = $request->ftelefono_contacto;
            if($request->has('fpagina_web_contacto'))
            $maestro->pagina_web_contacto = $request->fpagina_web_contacto;
            if($request->has('fcorreo_contacto'))
            $maestro->correo_contacto = $request->fcorreo_contacto;
            if($request->has('fmoneda_principal'))
            $maestro->moneda_principal = $request->fmoneda_principal;
            if($request->has('ftipo_cambio'))
            $maestro->tipo_cambio = $request->ftipo_cambio;
            if($request->has('fgiro_fical_negocio'))
            $maestro->giro_fical_negocio = $request->fgiro_fical_negocio;
            if($request->has('ftipo_contribuyente'))
            $maestro->tipo_contribuyente = $request->ftipo_contribuyente;
            if($request->has('fnit_niff'))
            $maestro->nit_niff = $request->fnit_niff;
            if($request->has('fn_registro_fiscal'))
            $maestro->n_registro_fiscal = $request->fn_registro_fiscal;
            if($request->has('fcobra_iva'))
            $maestro->cobra_iva = $request->fcobra_iva;
            if($request->has('fentera_iva'))
            $maestro->entera_iva = $request->fentera_iva;
            if($request->has('fporc_retencion'))
            $maestro->porc_retencion = $request->fporc_retencion;
            if($request->has('fpercepcion'))
            $maestro->percepcion = $request->fpercepcion;
            if($request->has('fcta_pasivo_dos'))
            $maestro->cta_pasivo_uno = $request->fcta_pasivo_uno;
            if($request->has('fcta_activo_dos'))
            $maestro->cta_pasivo_dos = $request->fcta_pasivo_dos;
            if($request->has('fcta_activo_uno'))
            $maestro->cta_activo_uno = $request->fcta_activo_uno;
            if($request->has('fcta_activo_dos'))
            $maestro->cta_activo_dos = $request->fcta_activo_dos;
            if($request->has('fcomision'))
            $maestro->comision = $request->fcomision;
            if($request->has('femitira_nc'))
            $maestro->emitira_nc = $request->femitira_nc;

            if($request->has('fcondiciones_operacion'))
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
