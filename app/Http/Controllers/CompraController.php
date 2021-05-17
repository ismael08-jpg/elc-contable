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



class CompraController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    
    }

    public function index($id, Request $request){

        $compras = Compra::select('compra.*', 'proveedor.nombre_proveedor')
        ->join('proveedor', 'compra.id_proveedor', '=', 'proveedor.id_proveedor')
        ->where("id_venta", "=", $id)
        ->get();

        $venta = Ventum::where('id_venta', '=', $id)->first();


        return  view('compra.compra', compact('compras', 'venta'));
    }

    public function store(Request $request){

        /*
        / llamamos al maestro del proveedor (datos del proveedor)
        / para poder evaluar las cuentas con los datos de los proveedores
        */

        $proveedor = MaestroProveedor::where('id_proveedor', '=', $request->id_proveedor)


        //creamos la cuenta a pagar de la venta
        $cuentaPagar = new CuentasPagar();
        $cuentaPagar->iva = ($request->monto_com*0.13);
        $cuentaPagar->retencion = ($request->monto_com*($proveedor->porc_retencion/100))
    
        
        //creamos las cuentas a cobrar para la VENTA
        $cuentaCobrar = new CuentasCobrar();
        $cuentaCobrar->monto_cobrar = ($request->monto_com*($proveedor->comision/100));
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


    }
    public function update(){}
    public function destroy(){}
}
