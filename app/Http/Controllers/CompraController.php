<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ventum;
use App\Models\Cliente;
use App\Models\DetalleVentum;
use Illuminate\Support\Facades\Auth;
use App\Models\Compra;
use App\Models\Proveedor;
use App\Models\CuentasCobrar;
use App\Models\CuentasPagar;
use App\Models\MaestroProveedor;
use App\Models\DetalleCompra;



class CompraController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    
    }

    public function index($id, Request $request){
        Auth::user()->autorizarRol([1]);
        //Validación para alertas de toastr
        if ($request->session()->has('alerta') and $request->session()->get('contador') == 1)
            {
                $alerta = $request->session()->get('alerta');
                $request->session()->put('contador', 0);
                
            }
        else{
            $alerta = "no traia valor";
        }

        //llama a las compras
        $compras = Compra::select('compra.*', 'proveedor.nombre_proveedor', 'cuentas_pagar.*', 'cuentas_cobrar.*')
        ->join('proveedor', 'compra.id_proveedor', '=', 'proveedor.id_proveedor')
        ->join('cuentas_pagar', 'cuentas_pagar.id_cuenta_pagar', '=', 'compra.id_cuenta_pagar')
        ->join('cuentas_cobrar', 'cuentas_cobrar.id_cuenta_cobrar', '=', 'compra.id_cuenta_cobrar')
        ->where("id_venta", "=", $id)
        ->get();

        //llama a las ventas
        $venta = Ventum::where('id_venta', '=', $id)->first();

        //llama a los proveedores, para el select
        $proveedor = Proveedor::select("*")->orderBy('id_proveedor')->get();


        return  view('compra.compra', compact('compras', 'venta', 'proveedor', 'alerta'));
    }

    public function store(Request $request){
        Auth::user()->autorizarRol([1]);

        /*Validaciones del lado del servidor*/
        $validacion = $request->validate([
            'id_proveedor' => 'required|numeric',
            'credito_fiscal' => 'required|max:50',
            'monto_com' => 'required|numeric|min:1',
            'concepto_com' => 'required|max:50',
            'fecha_emision' => 'required|date',
            'fecha_vencimiento' => 'required|date'
        ]);

        /*
        / llamamos al maestro del proveedor (datos del proveedor)
        / para poder evaluar las cuentas con los datos de los proveedores
        */
        $maestroProveedor = MaestroProveedor::where('id_proveedor', '=', $request->id_proveedor)->first();

      
        //creamos la cuenta a pagar de la venta
        $cuentaPagar = new CuentasPagar();
        $cuentaPagar->iva = ($request->monto_com*0.13);
        $cuentaPagar->retencion = ($request->monto_com*(($maestroProveedor->porc_retencion)/100));
        $cuentaPagar->save();
        
        //creamos las cuentas a cobrar para la VENTA
        $cuentaCobrar = new CuentasCobrar();
        $cuentaCobrar->monto_cobrar = ($request->monto_com*($maestroProveedor->comision/100));
        $cuentaCobrar->fecha_vencimiento_monto = $request->fecha_vencimiento;
        $cuentaCobrar->save();

        //Finalmente se crea la compra :)
        $compra = new Compra();
        $compra->id_proveedor = $request->id_proveedor;
        $compra->id_venta = $request->id_venta;
        $compra->id_cuenta_pagar = $cuentaPagar->id_cuenta_pagar;
        $compra->id_cuenta_cobrar = $cuentaCobrar->id_cuenta_cobrar;
        $compra->credito_fiscal = $request->credito_fiscal;
        $compra->monto_com = $request->monto_com;
        $compra->concepto_com = $request->concepto_com;
        $compra->fecha_emision = $request->fecha_emision;
        $compra->fecha_vencimiento = $request->fecha_vencimiento;
        $compra->save();
        
        //asiganmos valoreas las alertas.
        $request->session()->put('alerta', 'create');
        $request->session()->put('contador', 1);

        return redirect()->route('compra.index', $request->id_venta);
    }


    //Update ventas, CXC y CXP
    public function update(Request $request){
        Auth::user()->autorizarRol([1]);
        /*Validaciones del lado del servidor*/
        $validacion = $request->validate([
            'uid_compra' => 'required|numeric',
            'uid_proveedor' => 'required|numeric',
            'ucredito_fiscal' => 'required|max:50',
            'umonto_com' => 'required|numeric|min:1',
            'uconcepto_com' => 'required|max:50',
            'ufecha_emision' => 'required|date',
            'ufecha_vencimiento' => 'required|date'
        ]);

        /*
        / llamamos al maestro del proveedor (datos del proveedor)
        / para poder evaluar las cuentas con los datos de los proveedores
        / ojo que se actualizaran con los datos del proveedor actual, es probale que alguien haya combiado 
          datos en los maestros del proveedor y debido a esto los datos cambien.
        */
        $maestroProveedor = MaestroProveedor::where('id_proveedor', '=', $request->uid_proveedor)->first();

        $compra = Compra::find($request->uid_compra);
      
        //editamos la cuenta a pagar de la venta
        $cuentaPagar = CuentasPagar::find($compra->id_cuenta_pagar);
        $cuentaPagar->iva = ($request->umonto_com*0.13);
        $cuentaPagar->retencion = ($request->umonto_com*(($maestroProveedor->porc_retencion)/100));
        $cuentaPagar->save();
        
        //editamos las cuentas a cobrar para la VENTA
        $cuentaCobrar = CuentasCobrar::find($compra->id_cuenta_cobrar);
        $cuentaCobrar->monto_cobrar = ($request->umonto_com*($maestroProveedor->comision/100));
        $cuentaCobrar->fecha_vencimiento_monto = $request->ufecha_vencimiento;
        $cuentaCobrar->save();

        //Finalmente se actualiza la compra >:)
        $compra->id_proveedor = $request->uid_proveedor;
        $compra->credito_fiscal = $request->ucredito_fiscal;
        $compra->monto_com = $request->umonto_com;
        $compra->concepto_com = $request->uconcepto_com;
        $compra->fecha_emision = $request->ufecha_emision;
        $compra->fecha_vencimiento = $request->ufecha_vencimiento;
        $compra->save();
        
        //asiganmos valoreas las alertas.
        $request->session()->put('alerta', 'update');
        $request->session()->put('contador', 1);

        return redirect()->route('compra.index', $request->uid_venta);

    }



    public function destroy(Request $request){
        Auth::user()->autorizarRol([1]);

        $validacion = $request->validate([
            'did_compra' => 'required|numeric',
        ]);

        //preparamos los objetos para eliminar las fulas
        $compra = Compra::find($request->did_compra);
        $cuentaPagar = CuentasPagar::find($compra->id_cuenta_pagar);
        $cuentaCobrar = CuentasCobrar::find($compra->id_cuenta_cobrar);
    
        //salvamos el id de la venta para poder regressar :V
        $id_venta = $compra->id_venta;

        //validamos que no hayan detalles ligados
        $detalle = DetalleCompra::where('id_compra', '=', $request->did_compra);
        
        //validación
        if($detalle->count() == 0){
            //eliminamos
            $compra->delete();
            $cuentaPagar->delete();
            $cuentaCobrar->delete();
            

            //alertas
            $request->session()->put('alerta', 'delete');
            $request->session()->put('contador', 1);
        } else{
            $request->session()->put('alerta', 'errorDelete');
            $request->session()->put('contador', 1);
        }

        return redirect()->route('compra.index', $id_venta);

    }
}
