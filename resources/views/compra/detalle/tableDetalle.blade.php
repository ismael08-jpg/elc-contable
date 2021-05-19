<table style="border-radius: 10px; text-align: center"  id="detalleTable"  class="align-items-center table table-responsive table-sm table-hover">
    <thead class="thead-dark">
        <tr>
             <th>#</th>
             <th style="width: 88%">Descripción</th>
             <th>Precio Unitario</th>
             <th>Cantidad</th>
             <th>presupuesto</th>
             <th>Sub-total</th>
             <th>-</th>
             <th>-</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($detalles as $det)
         <tr>
             <td>{{$det->id_detalle_compra}}</td>
             <td>{{$det->descripcion}}</td>
             <th>${{number_format($det->precio_unitario, 2, ".",",")}}</th>
             <td>{{$det->cantidad}}</td>
             <td>{{$det->presupuesto}}</td>
             <td>{{$det->sub_total}}</td>

             <td>
                <input type="image" onclick="eliminarD({{$det->id_detalle_compra}}, {{$det->id_compra}});"  class="btn-calc math sombra" height="40px" width="40px" 
                src="{{asset('assets/img/del.png')}}"/>
             </td>
             <td>
                 <input type="image" onclick="editarD({{$det->id_detalle_compra}}, {{$det->id_compra}}, '{{$det->descripcion}}', {{$det->precio_unitario}}, {{$det->cantidad}}, {{$det->presupuesto}})" class="btn-calc math sombra" height="40px" width="40px" src="{{asset('assets/img/edi.png')}}"/>
            </td>             
         </tr>    
         @endforeach
    </tbody>
</table>