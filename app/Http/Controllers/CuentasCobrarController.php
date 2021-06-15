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

class CuentasCobrarController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    
    }


    //modificar la fecha de pago de la Comisión
    public function comision(Request $request){
        Auth::user()->autorizarRol([1]);
        
         //Validaciones de Laravel
         $validacion = $request->validate([
            'cId_compra' => 'required',
            'cFecha_pago_comision' => 'required',
        ]);

        $compra = Compra::find($request->cId_compra);
        $cuentaCobrar = CuentasCobrar::find($compra->id_cuenta_cobrar);

        $cuentaCobrar->fecha_pago_monto = $request->cFecha_pago_comision;
        $cuentaCobrar->save();

        $request->session()->put('alerta', 'update');
        $request->session()->put('contador', 1);

        return redirect()->route('compra.index', $compra->id_venta);
        
    }

    
}