<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\MaestroProveedor;
use App\Models\Proveedor;
use App\Models\Compra;
use App\Models\Pais;
use App\Models\Estado;
use App\Models\Municipio;


class MaestroProveedorController extends Controller
{
    public $contador;

    public function __construct()
    {
        $this->middleware('auth');
         
    }
    

    public function index(Request $request){

        // if ($request->session()->has('contador'))
        //     $contador = $request->session()->get('contador');
        // else 
        //     $contador = 0;
        
        if ($request->session()->has('alerta') and $request->session()->get('contador') == 1)
            {
                $alerta = $request->session()->get('alerta');
                $request->session()->put('contador', 0);
                
            }
        else{
            $alerta = "no traia valor";
        }
        
        Auth::user()->autorizarRol([1]);

        $pais = Pais::get();
        $paisArray[''] = "Selecciona un País";

        foreach($pais as $p){
            $paisArray[$p->id] = $p->nombre_pais;
        }
        

        $maestro = MaestroProveedor::select('maestro_proveedor.*', 'proveedor.*')
        ->join('proveedor', 'maestro_proveedor.id_proveedor', '=', 'proveedor.id_proveedor')
        ->get();
        
        return view('maestros.maestroProveedor', compact('maestro', 'alerta', 'paisArray'));
    }


    public function store(Request $request){
        Auth::user()->autorizarRol([1]);


        $validacion = $request->validate([
            
            'nombre_proveedor' => 'required',
            'numero_proveedor_icg' => 'required',
            //'numero_proveedor' => 'required',
            'nombre_comercial' => 'required',

            'nombre_del_sujeto' => 'required',
            'direccion' => 'required',
            'pais' =>'required',
            'codigo_pais' =>'required',
            'ciudad' =>'required',
            'departamento' =>'required',
            'municipio' =>'required',
            //'telefono_fijo' =>'required',
            'pagina_web' =>'required',
            'correo' =>'email|required',
            'telefono_celular' =>'required',
           'paraiso_fiscal' =>'required',
            'nombre_contacto' =>'required',
            'telefono_contacto' =>'required',
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
            'emitira_nc' =>'required',
            //'condiciones_operacion' =>'required',
        ]);

        $proveedor = new Proveedor();

        $proveedor->nombre_proveedor = $request->nombre_proveedor;
        $proveedor->save();

        $maestro = new Maestroproveedor();
        $maestro->id_proveedor = $proveedor->id_proveedor;
        $maestro->numero_proveedor_icg = $request->numero_proveedor_icg;
        $maestro->numero_proveedor = $request->numero_proveedor;
        $maestro->nombre_comercial = $request->nombre_comercial;
        $maestro->nombre_del_sujeto = $request->nombre_del_sujeto;
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
        $maestro->cta_pasivo_dos = $request->cta_pasivo_dos;
        $maestro->cta_activo_uno = $request->cta_activo_uno;
        $maestro->cta_activo_dos = $request->cta_activo_dos;
        $maestro->comision = $request->comision;
        $maestro->emitira_nc = $request->emitira_nc;

        $maestro->condiciones_operacion = $request->condiciones_operacion;
        $maestro->save();

        $request->session()->put('alerta', 'create');
        $request->session()->put('contador', 1);
            
        //return $this->alert;
        return redirect()->route('maestroProveedor.index');
        }






        public function update(Request $request){
            Auth::user()->autorizarRol([1]);

            $validacion = $request->validate([
                
                'fid_maestro_proveedor' => 'required',
                'fid_proveedor' => 'required',
                'fnombre_proveedor' => 'required',
                'fnumero_proveedor_icg' => 'required',
                //'numero_proveedor' => 'required',
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

            $proveedor = Proveedor::find($request->fid_proveedor);
            $proveedor->nombre_proveedor = $request->fnombre_proveedor;
            $proveedor->save();

            $maestro = Maestroproveedor::find($request->fid_maestro_proveedor);
            $maestro->id_proveedor = $request->fid_proveedor;
            $maestro->numero_proveedor_icg = $request->fnumero_proveedor_icg;
            $maestro->numero_proveedor = $request->fnumero_proveedor;
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
