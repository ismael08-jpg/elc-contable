<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ventum;
use App\Models\Cliente;
use App\Models\DetalleVentum;
use Illuminate\Support\Facades\Auth;

class detalleVentaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    
    }

    //función principal para llamar a la vista principal
    public function index ($id, Request $request){  
        Auth::user()->autorizarRol([1]);

        //validación para que las alertas se muestren solo una
        if ($request->session()->has('alerta') and $request->session()->get('contador') == 1)
            {
                $alerta = $request->session()->get('alerta');
                $request->session()->put('contador', 0);
                
            }
        else{
            $alerta = "no traia valor";
        }
        
       
        $venta = Ventum::select('venta.*', 'cliente.nombre_cliente')
        ->join('cliente', 'venta.id_cliente', '=', 'cliente.id_cliente')
        ->where("venta.id_venta", "=", $id)
        ->first();
        
        $detalle = DetalleVentum::select('*')->where("id_venta", "=", $id)->get();

        return view('venta.detalle.detalleVenta', compact('venta', 'detalle', 'alerta'));
    }

    public function store(Request $request)
    {
        Auth::user()->autorizarRol([1]);

       

        $validacion = $request->validate([
            'id_venta' => 'required|numeric',
            'descripcion' => 'required|max:200',
            'precio_unitario' => 'required|numeric|min:1',
            'cantidad' => 'required|numeric|min:1',
            'presupuesto' => 'required|numeric|min:0',
            'ventas_no_sujetas' => 'required|numeric|min:0',
            'ventas_grabadas' => 'required|numeric|min:0',
        ]);

        $detalle = new DetalleVentum();

        $detalle->id_venta = $request->id_venta;
        $detalle->descripcion = $request->descripcion;
        $detalle->precio_unitario = $request->precio_unitario;
        $detalle->cantidad = $request->cantidad;
        $detalle->presupuesto = $request->presupuesto;
        $detalle->ventas_no_sujetas = $request->ventas_no_sujetas;
        $detalle->ventas_grabadas = $request->ventas_grabadas;
        $detalle->sub_total = ($request->cantidad*$request->precio_unitario);
        $detalle->save();
        $request->session()->put('alerta', 'create');
        $request->session()->put('contador', 1);
        return redirect()->route('detalleVenta.index', $request->id_venta);
    }

    public function update(Request $request)
    {
        Auth::user()->autorizarRol([1]);

        $validacion = $request->validate([
            'uid_detalle_venta' => 'required|numeric',
            //'uid_venta' => 'required|numeric',
            'udescripcion' => 'required|max:200',
            'uprecio_unitario' => 'required|numeric|min:1',
            'ucantidad' => 'required|numeric|min:1',
            'upresupuesto' => 'required|numeric|min:0',
            'uventas_no_sujetas' => 'required|numeric|min:0',
            'uventas_grabadas' => 'required|numeric|min:0',
        ]);

        $detalle = DetalleVentum::find($request->uid_detalle_venta);
        $detalle->descripcion = $request->udescripcion;
        $detalle->precio_unitario  = $request->uprecio_unitario;
        $detalle->cantidad = $request->ucantidad;
        $detalle->presupuesto = $request->upresupuesto;
        $detalle->ventas_no_sujetas = $request->uventas_no_sujetas;
        $detalle->ventas_grabadas = $request->uventas_grabadas;
        $detalle->sub_total = $request->ucantidad*$request->uprecio_unitario;
        $detalle->save();
        
        //alertas
        $request->session()->put('alerta', 'update');
        $request->session()->put('contador', 1);
        return redirect()->route('detalleVenta.index', $detalle->id_venta);

    }

    public function destroy(Request $request)
    {
        Auth::user()->autorizarRol([1]);

        $validacion = $request->validate([
            'did_detalle_venta' => 'required|numeric',
        ]);

        $detalle = DetalleVentum::find($request->did_detalle_venta);
        $id = $detalle->id_venta;
        $detalle->delete();
        
        //alertas
        $request->session()->put('alerta', 'delete');
        $request->session()->put('contador', 1);
        return redirect()->route('detalleVenta.index', $id);

    }
    
}
