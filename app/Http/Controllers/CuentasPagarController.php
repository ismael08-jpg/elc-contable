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
}
