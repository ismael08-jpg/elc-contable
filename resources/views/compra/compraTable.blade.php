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
             <th>-</th>
             <th>-</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($compras as $con)
         <tr>
             <td>{{$con->id_compra}}</td>
             <td style="width: 30%">{{$con->nombre_proveedor}}</td>
             <td>{{$con->credito_fiscal}}</td>
             <th>${{number_format($con->monto_com, 2, ".",",")}}</th>
             <td>{{$con->concepto_com}}</td>
             <td>{{$con->fecha_emision->format('d/m/Y')}}</td>
             <td>{{$con->fecha_vencimiento->format('d/m/Y')}}</td>
             
             <td>
                <input type="image" onclick="eluminarV({{$con->id_venta}});"  class="btn-calc math sombra" height="40px" width="40px" 
                src="{{asset('assets/img/del.png')}}"/>
             </td>
             <td>
                 <input type="image" onclick="editarV()" class="btn-calc math sombra" height="40px" width="40px" src="{{asset('assets/img/edi.png')}}"/>
            </td>             
         </tr>    
         @endforeach
    </tbody>
</table>