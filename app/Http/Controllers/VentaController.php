<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\MaestroCliente;
use App\Models\Cliente;
use App\Models\Ventum;

class VentaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
         
    }


    public function index(Request $request){  
        Auth::user()->autorizarRol([1, 2]);

        //Validación para alertas de toastr
        if ($request->session()->has('alerta') and $request->session()->get('contador') == 1)
            {
                $alerta = $request->session()->get('alerta');
                $request->session()->put('contador', 0);
                
            }
        else{
            $alerta = "no traia valor";
        }

        //Ventas y clientes
        $ventas = Ventum::select('venta.*', 'cliente.*')
        ->join('cliente', 'venta.id_cliente', '=', 'cliente.id_cliente')
        ->get();

        //Cliente para select
        $clientes = Cliente::select('*')->orderBy('nombre_cliente')->get();

        return view('venta.venta', compact('ventas', 'clientes', 'alerta'));
    }

    public function store(Request $request){
        Auth::user()->autorizarRol([1, 2]);

        

        //Validaciones de Laravel
        $validacion = $request->validate([
            'id_cliente' => 'required',
            'credito_fiscal' => 'required|unique:venta',
            'monto_ven' => 'required|min:0.01',
            'concepto_ven' => 'required',
            'fecha_emision' => 'required',
            'fecha_vencimiento' => 'required',
        ]);
        
        //store ventas
        $venta = new Ventum();

        $venta->id_cliente = $request->id_cliente; 
        $venta->credito_fiscal = $request->credito_fiscal; 
        $venta->monto_ven = $request->monto_ven; 
        $venta->concepto_ven = $request->concepto_ven;
        $venta->fecha_emision = $request->fecha_emision;
        $venta->fecha_vencimiento = $request->fecha_vencimiento;
        $venta->save();

        //guardamos las seciones para las alertas de toastr
        $request->session()->put('alerta', 'create');
        $request->session()->put('contador', 1);

        return redirect()->route('venta.index');
    }


    //function to update the ventas

    public function update(Request $request){
        Auth::user()->autorizarRol([1]);

        //Validaciones de Laravel
        $validacion = $request->validate([
            'uId_venta' => 'required',
            'uId_cliente' => 'required',
            'uCredito_fiscal' => 'required|unique:App\Models\Ventum,credito_fiscal,'.$request->uId_venta,
            'uMonto_ven' => 'required|min:0.01',
            'uConcepto_ven' => 'required',
            'uFecha_emision' => 'required',
            'uFecha_vencimiento' => 'required',
        ]);

        //store ventas
        $venta = Ventum::find($request->uId_venta);

        $venta->id_cliente = $request->uId_cliente; 
        $venta->credito_fiscal = $request->uCredito_fiscal; 
        $venta->monto_ven = $request->uMonto_ven; 
        $venta->concepto_ven = $request->uConcepto_ven;
        $venta->fecha_emision = $request->uFecha_emision;
        $venta->fecha_vencimiento = $request->uFecha_vencimiento;
        $venta->save();
        
        $request->session()->put('alerta', 'update');
        $request->session()->put('contador', 1);

        return redirect()->route('venta.index');
    }

    //function to delete the ventas

    public function destroy(Request $request){
        Auth::user()->autorizarRol([1]);

        //Validaciones de Laravel
        $validacion = $request->validate([
            'dId_venta' => 'required',
        ]);

        //store ventas
        $venta = Ventum::find($request->dId_venta);
        $venta->delete();
        
        $request->session()->put('alerta', 'delete');
        $request->session()->put('contador', 1);

        return redirect()->route('venta.index');
    }


    //This is a function to pay the ventas
    public function pay(Request $request){
        Auth::user()->autorizarRol([1]);

        //Validaciones de Laravel
        $validacion = $request->validate([
            'pId_venta' => 'required',
            'fecha_pago'=>'required',
        ]);

        //store ventas
        $venta = Ventum::find($request->pId_venta);

       
        $venta->fecha_pago_venta = $request->fecha_pago;
        $venta->save();
        
        $request->session()->put('alerta', 'pay');
        $request->session()->put('contador', 1);

        return redirect()->route('venta.index');
    }

    public function editPay(Request $request){
        Auth::user()->autorizarRol([1]);

        //Validaciones de Laravel
        $validacion = $request->validate([
            'epId_venta' => 'required',
            'epFecha_pago'=>'required',
        ]);

        //store ventas
        $venta = Ventum::find($request->epId_venta);

       
        $venta->fecha_pago_venta = $request->epFecha_pago;
        $venta->save();
        
        $request->session()->put('alerta', 'editPay');
        $request->session()->put('contador', 1);

        return redirect()->route('venta.index');
    }

}

//editPay
