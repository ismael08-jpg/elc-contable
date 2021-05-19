<table style="border-radius: 10px; text-align: center"  id="ventaTable"  class="align-items-center table table-responsive table-sm table-hover">
    <thead class="thead-dark">
        <tr>
             <th>#</th>
             <th>Descripción</th>
             <th>Precio Unitario</th>
             <th>Cantidad</th>
             <th>Presupuesto</th>
             <th>Ventas No Sujetas</th>
             <th>Ventas Grabadas</th>
             <th>Sub-Total</th>
             <th>-</th>
             <th>-</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($detalle as $det)
         <tr>
             <td>{{$det->id_detalle_venta}}</td>
             <td style="width: 30%">{{$det->descripcion}}</td>
             <th>${{number_format($det->precio_unitario, 2, ".",",")}}</th>
             <td>{{$det->cantidad}}</td>
             <th>${{number_format($det->presupuesto, 2, ".",",")}}</th>
             <th>${{number_format($det->ventas_no_sujetas, 2, ".",",")}}</th>
             <th>${{number_format($det->ventas_grabadas, 2, ".",",")}}</th>
             <th>${{number_format($det->sub_total, 2, ".",",")}}</th>


             <td>
                <input type="image" onclick="eluminarV({{$det->id_detalle_venta}});"  class="btn-calc math sombra" height="40px" width="40px" 
                src="{{asset('assets/img/del.png')}}"/>
             </td>
             <td>
                 <input type="image" onclick="editarV({{$det->id_detalle_venta}}, {{$det->id_venta}},'{{$det->descripcion}}',{{$det->precio_unitario}},{{$det->cantidad}},{{$det->presupuesto}},{{$det->ventas_no_sujetas}},{{$det->ventas_grabadas}})" class="btn-calc math sombra" height="40px" width="40px" src="{{asset('assets/img/edi.png')}}"/>
            </td>
             
             
         </tr>    
         @endforeach
    </tbody>
</table>