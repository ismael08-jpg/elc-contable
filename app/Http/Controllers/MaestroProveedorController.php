<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\MaestroProveedor;
use App\Models\Proveedor;
use App\Models\Compra;
use App\Models\Pais;
use App\Models\Estado;
use App\Models\Moneda;
use App\Models\Municipio;


class MaestroProveedorController extends Controller
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
        
        

        $pais = Pais::select("*")->orderBy("nombre_pais")->get();

        $maestro = MaestroProveedor::select('maestro_proveedor.*', 'proveedor.*')
        ->join('proveedor', 'maestro_proveedor.id_proveedor', '=', 'proveedor.id_proveedor')
        ->get();
        $moneda = Moneda::select('codigo', 'nombre_moneda', 'simbolo')->orderBy('nombre_moneda')->get();
        $estado = Estado::all();
        $municipio = Municipio::all();
        return view('maestros.maestroProveedor', compact('maestro', 'alerta', 'pais', 'estado', 'municipio', 'moneda'));
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
            'nombre_proveedor' => 'required|max:50',
            'numero_proveedor_icg' => 'required|max:50',
            'numero_proveedor' => 'max:50',
            'nombre_comercial' => 'required|max:50',

            'nombre_del_sujeto' => 'required|max:50',
            'direccion' => 'max:200',
            'pais' =>'required|max:50',
            'codigo_pais' =>'required|max:50',
            'ciudad' =>'required|max:50',
            'departamento' =>'required|max:50',
            'municipio' =>'required|max:50',
            'telefono_fijo' =>'required|size:'.$d,
            'pagina_web' =>'max:200',
            'correo' =>'email|required',
           'telefono_celular' =>'max:'.$d,
           'paraiso_fiscal' =>'required',
            'nombre_contacto' =>'required',
            'telefono_contacto' =>'required|size:'.$d,
            'cargo_contacto' =>'required',
            'pagina_web_contacto' => 'max:200',
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
            'cta_pasivo_dos' =>'max:50',
            'cta_activo_uno' =>'required',
             'cta_activo_dos' => 'max:50',
            'comision' => 'required|numeric|min:0.00',
            'emitira_nc' =>'required|max:2',
            'condiciones_operacion' =>'max:50',
        ]);
        $proveedor = new Proveedor();

        $proveedor->nombre_proveedor = $request->nombre_proveedor;
        $proveedor->save();

        $maestro = new Maestroproveedor();
        if($request->has('condiciones_credito'))
        $maestro->condiciones_credito = $request->condiciones_credito;
        $maestro->id_proveedor = $proveedor->id_proveedor;
        $maestro->numero_proveedor_icg = $request->numero_proveedor_icg;
        if($request->has('numero_proveedor'))
        $maestro->numero_proveedor = $request->numero_proveedor;
        $maestro->nombre_comercial = $request->nombre_comercial;
        $maestro->nombre_del_sujeto = $request->nombre_del_sujeto;
        if($request->has('direccion'))
        $maestro->direccion = $request->direccion;
        
        $pai = Pais::select('nombre_pais')->where('id', '=', $request->pais)->first();
        $maestro->pais = $pai->nombre_pais;

        $maestro->codigo_pais = $request->codigo_pais;
        $maestro->ciudad = $request->ciudad;

        
        $dep = Estado::select('nombre_estado')->where('id', '=', $request->departamento)->first();
        $maestro->departamento = $dep->nombre_estado;

        $maestro->municipio = $request->municipio;
        $maestro->telefono_fijo = $request->telefono_fijo;
        $maestro->pagina_web = $request->pagina_web;
        $maestro->correo = $request->correo;
        if($request->has('telefono_celular'))
        $maestro->telefono_celular = $request->telefono_celular;
        $maestro->paraiso_fiscal = $request->paraiso_fiscal;
        $maestro->nombre_contacto = $request->nombre_contacto;
        $maestro->cargo_contacto = $request->cargo_contacto;
        $maestro->telefono_contacto = $request->telefono_contacto;
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
        if($request->has('cta_pasivo_dos'))
        $maestro->cta_pasivo_dos = $request->cta_pasivo_dos;
        $maestro->cta_activo_uno = $request->cta_activo_uno;
        if($request->has('cta_activo_dos'))
        $maestro->cta_activo_dos = $request->cta_activo_dos;
        $maestro->comision = $request->comision;
        $maestro->emitira_nc = $request->emitira_nc;

        if($request->has('ondiciones_operacion'))
        $maestro->condiciones_operacion = $request->condiciones_operacion;
        $maestro->save();

        $request->session()->put('alerta', 'create');
        $request->session()->put('contador', 1);
            
        //return $this->alert;
        return redirect()->route('maestroProveedor.index');
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
                'fid_maestro_proveedor' => 'required',
                'fid_proveedor' => 'required',
                'fnombre_proveedor' => 'required',
                'fnumero_proveedor_icg' => 'required',
                'numero_proveedor' => 'max:50', //----
                'fnombre_comercial' => 'required',

                'fnombre_del_sujeto' => 'required',
                'fdireccion' => 'max:200', //---------------
                'fpais' =>'required',
                'fcodigo_pais' =>'required',
                'fciudad' =>'required',
                'fdepartamento' =>'required|max:50',
                'fmunicipio' =>'required|max:50',
                'ftelefono_fijo' =>'required|max:'.$d, 
                'fpagina_web' =>'max:200', //----------------------
                'fcorreo' =>'email|required',
                'ftelefono_celular' =>'max:'.$d,// ------------------------
                'fparaiso_fiscal' =>'required',
                'fnombre_contacto' =>'required',
                'ftelefono_contacto' =>'required|max:'.$d,
                'fcargo_contacto' =>'required',
                'fpagina_web_contacto' => 'max:200', ///-----------------
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
                'fcta_pasivo_dos' =>'max:50',//-----------
                'fcta_activo_uno' =>'required',
                'fcta_activo_dos' =>'max:50',//-----------
                'fcomision' => 'required|numeric|min:0.00',
                'femitira_nc' =>'required',
                'fcondiciones_operacion' =>'max:200',//-----------
            ]);
            $proveedor = Proveedor::find($request->fid_proveedor);
            $proveedor->nombre_proveedor = $request->fnombre_proveedor;
            $proveedor->save();




            $maestro = Maestroproveedor::find($request->fid_maestro_proveedor);


           
            if($request->has('condiciones_credito'))
            $maestro->condiciones_credito = $request->fcondiciones_credito;
            $maestro->id_proveedor = $request->fid_proveedor;
            $maestro->numero_proveedor_icg = $request->fnumero_proveedor_icg;
            if($request->has('fnumero_proveedor'))
            $maestro->numero_proveedor = $request->fnumero_proveedor;
            $maestro->nombre_comercial = $request->fnombre_comercial;
            $maestro->nombre_del_sujeto = $request->fnombre_del_sujeto;
            if($request->has('fdireccion'))
            $maestro->direccion = $request->fdireccion;
            $maestro->pais = $request->fpais;
            $maestro->codigo_pais = $request->fcodigo_pais;
            $maestro->ciudad = $request->fciudad;
            $maestro->departamento = $request->fdepartamento;
            $maestro->municipio = $request->fmunicipio;
            $maestro->telefono_fijo = $request->ftelefono_fijo;
            if($request->has('fpagina_web'))
            $maestro->pagina_web = $request->fpagina_web;
            $maestro->correo = $request->fcorreo;
            if($request->has('ftelefono_celular'))
            $maestro->telefono_celular = $request->ftelefono_celular;
            $maestro->paraiso_fiscal = $request->fparaiso_fiscal;
            $maestro->nombre_contacto = $request->fnombre_contacto;
            $maestro->cargo_contacto = $request->fcargo_contacto;
            $maestro->telefono_contacto = $request->ftelefono_contacto;
            if($request->has('fpagina_web_contacto'))
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
            if($request->has('fcta_pasivo_dos'))
            $maestro->cta_pasivo_dos = $request->fcta_pasivo_dos;
            $maestro->cta_activo_uno = $request->fcta_activo_uno;
            if($request->has('fcta_activo_dos'))
            $maestro->cta_activo_dos = $request->fcta_activo_dos;
            $maestro->comision = $request->fcomision;
            $maestro->emitira_nc = $request->femitira_nc;
            if($request->has('fcondiciones_operacion'))
            $maestro->condiciones_operacion = $request->fcondiciones_operacion;
            $maestro->save();

            $request->session()->put('alerta', 'update');
            $request->session()->put('contador', 1);
        
            //return $this->alert;
            return redirect()->route('maestroProveedor.index');
        }

        public function destroy(Request $request){
            Auth::user()->autorizarRol([1]);

            $validacion = $request->validate([
                'did_maestro_proveedor' => 'required',
                'did_proveedor' => 'required',
            ]);

            $ventasProveedor = Compra::where("id_proveedor", '=', $request->did_proveedor )->get();

            if($ventasProveedor->count() == 0){

                $maestro = Maestroproveedor::find($request->did_maestro_proveedor);
                $maestro->delete();

                $proveedor = Proveedor::find($request->did_proveedor);
                $proveedor->delete();

                

                $request->session()->put('alerta', 'delete');
                $request->session()->put('contador', 1);

            }else
            {
                $request->session()->put('alerta', 'deleteError');
                $request->session()->put('contador', 1);
            }

            return redirect()->route('maestroProveedor.index');
        }


}
