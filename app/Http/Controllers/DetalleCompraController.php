<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ventum;
use App\Models\Cliente;
use App\Models\DetalleCompra;
use App\Models\Compra;
use Illuminate\Support\Facades\Auth;

class DetalleCompraController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    
    }

    public function index(Request $request, $id){

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

        $compra = Compra::where('id_compra', '=', $id)->first();
        $detalles = DetalleCompra::select('*')->where('id_compra', '=', $id)->get();

        return view('compra.detalle.detalle', compact('detalles', 'compra', 'alerta'));
    }

    public function store(Request $request){
        Auth::user()->autorizarRol([1,2]);
        //validate
        $validacion = $request->validate([
            'id_compra' => 'required|numeric',
            'precio_unitario' => 'required|numeric|min:0.01',
            'descripcion' => 'required|max:200',
            'cantidad' => 'required|numeric|min:1',
            'presupuesto' => 'required|numeric|min:0',
        ]);

        //store it
        $detalle = new DetalleCompra();
        $detalle->id_compra = $request->id_compra;
        $detalle->precio_unitario = $request->precio_unitario;
        $detalle->descripcion = $request->descripcion;
        $detalle->cantidad = $request->cantidad;
        $detalle->presupuesto = $request->presupuesto;
        $detalle->sub_total = ($request->cantidad*$request->precio_unitario);
        $detalle->save();
        $request->session()->put('alerta', 'create');
        $request->session()->put('contador', 1);

        return redirect()->route('detalleCompra.index', $request->id_compra);

    }
    public function update(Request $request){
        Auth::user()->autorizarRol([1]);
        //validate
        $validacion = $request->validate([
            'uid_detalle_compra' => 'required|numeric',
            'uid_compra' => 'required|numeric',
            'uprecio_unitario' => 'required|numeric|min:0.01',
            'udescripcion' => 'required|max:200',
            'ucantidad' => 'required|numeric|min:1',
            'upresupuesto' => 'required|numeric|min:0',
        ]);

        //store it
        $detalle = DetalleCompra::find($request->uid_detalle_compra);
        $detalle->id_compra = $request->uid_compra;
        $detalle->precio_unitario = $request->uprecio_unitario;
        $detalle->descripcion = $request->udescripcion;
        $detalle->cantidad = $request->ucantidad;
        $detalle->presupuesto = $request->upresupuesto;
        $detalle->sub_total = ($request->ucantidad*$request->uprecio_unitario);
        $detalle->save();
        $request->session()->put('alerta', 'update');
        $request->session()->put('contador', 1);

        return redirect()->route('detalleCompra.index', $request->uid_compra);
    }
    public function destroy(Request $request){
        Auth::user()->autorizarRol([1]);


        //validate
        $validacion = $request->validate([
            'did_detalle_compra' => 'required|numeric',
            'did_compra' => 'required|numeric',
        ]);

        //delete it
        $detalle = DetalleCompra::find($request->did_detalle_compra);
        $detalle->delete();

        $request->session()->put('alerta', 'delete');
        $request->session()->put('contador', 1);

        return redirect()->route('detalleCompra.index', $request->did_compra);


    }

}
