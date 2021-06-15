<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CuentasCobrar;
use App\Models\CuentasPagar;
use App\Models\MaestroProveedor;
use App\Models\DetalleCompra;
use App\Models\Compra;
use App\Models\Ventum;

class CuentasPagarController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    
    }


    public function index(Request $request){
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

        $compras = Compra::with('cuentas_pagar', 'proveedor')->get();
        $ventas = Ventum::with('cliente')->get();

        return  view('cuentasPagar.cuentasPagarGeneral', compact('compras', 'ventas'));
    }


    //modificar la fecha de pago del IVA
    public function iva(Request $request){
        Auth::user()->autorizarRol([1]);
        
         //Validaciones de Laravel
         $validacion = $request->validate([
            'mId_compra' => 'required',
            'mFecha_pago_iva' => 'required',
        ]);

        $compra = Compra::find($request->mId_compra);
        $cuentaPagar = CuentasPagar::find($compra->id_cuenta_pagar);
        $cuentaPagar->fecha_pago_iva = $request->mFecha_pago_iva;
        $cuentaPagar->save();

        $request->session()->put('alerta', 'update');
        $request->session()->put('contador', 1);

        return redirect()->route('compra.index', $compra->id_venta);
        
    }


    //modificar la fecha de pago de la retención
    public function retencion(Request $request){
        Auth::user()->autorizarRol([1]);
        
         //Validaciones de Laravel
         $validacion = $request->validate([
            'rId_compra' => 'required',
            'rFecha_pago_retencion' => 'required',
        ]);

        $compra = Compra::find($request->rId_compra);
        $cuentaPagar = CuentasPagar::find($compra->id_cuenta_pagar);

        $cuentaPagar->fecha_pago_retencion = $request->rFecha_pago_retencion;
        $cuentaPagar->save();

        $request->session()->put('alerta', 'update');
        $request->session()->put('contador', 1);

        return redirect()->route('compra.index', $compra->id_venta);
        
    }


    
}
