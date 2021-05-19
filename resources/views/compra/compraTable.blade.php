{{-- Reporte Libert�metro junio-agosto 2020.pdf --}}
<table style="border-radius: 10px; text-align: center"  id="ventaTable"  class="align-items-center table table-responsive table-sm table-hover">
    <thead class="thead-dark">
        <tr>
             <th>#</th>
             <th>Proveedor</th>
             <th>Credito Fiscal</th>
             <th>Monto de la Compra</th>
             <th>Concepto de la Compra</th>
             <th>Fecha Emisión</th>
             <th>Fecha Vencimiento</th>
             <th>IVA</th>
             <th>Retención</th>
             <th>Comisión</th>
             <th>-</th>
             <th>-</th>
             <th>-</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($compras as $con)
         <tr>
             <td>{{$con->id_compra}}</td>
             <td>{{$con->nombre_proveedor}}</td>
             <td>{{$con->credito_fiscal}}</td>
             <th>${{number_format($con->monto_com, 2, ".",",")}}</th>
             <td>{{$con->concepto_com}}</td>
             <td>{{$con->fecha_emision->format('d/m/Y')}}</td>
             <td>{{$con->fecha_vencimiento->format('d/m/Y')}}</td>

             @if ($con->fecha_pagi_iva==null)
                <th style="background-color: #f55c47; border-radius: 5px;">${{number_format($con->iva,2,'.',',')}}</th>
             @else
                <th style="background-color: #81b214; border-radius: 5px;">${{number_format($con->iva,2,'.',',')}}</th>
             @endif

             @if ($con->fecha_pago_retencion==null)
                <th style="background-color: #f55c47; border-radius: 5px;">${{number_format($con->retencion,2,'.',',')}}</th>
             @else
                <th style="background-color: #81b214; border-radius: 5px;">${{number_format($con->retencion,2,'.',',')}}</th>
             @endif
             
             @if ($con->fecha_pago_monto==null)
                <th style="background-color: #f55c47; border-radius: 5px;">${{number_format($con->monto_cobrar,2,'.',',')}}</th>
             @else
                <th style="background-color: #81b214; border-radius: 5px;">${{number_format($con->monto_cobrar,2,'.',',')}}</th>
             @endif
          

             

             <td>
                  <a href="{{route('detalleCompra.index', $con->id_compra)}}">Detalles</a>
            </td>

             <td>
                <input type="image" onclick="eliminarC({{$con->id_compra}});"  class="btn-calc math sombra" height="40px" width="40px" 
                src="{{asset('assets/img/del.png')}}"/>
             </td>
             <td>
                 <input type="image" onclick="editarC({{$con->id_compra}}, {{$con->id_proveedor}}, '{{$con->credito_fiscal}}', {{$con->monto_com}},
                 '{{$con->concepto_com}}', '{{$con->fecha_emision->format('Y-m-d')}}', '{{$con->fecha_vencimiento->format('Y-m-d')}}' )" class="btn-calc math sombra" height="40px" width="40px" src="{{asset('assets/img/edi.png')}}"/>
            </td>             
         </tr>    
         @endforeach
    </tbody>
</table>