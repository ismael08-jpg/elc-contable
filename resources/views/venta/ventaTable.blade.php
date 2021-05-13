<table style="border-radius: 10px; text-align: center"  id="ventaTable"  class="align-items-center table table-responsive table-sm table-hover">
    <thead class="thead-dark">
        <tr>
             <th>#</th>
             <th>Cliente</th>
             <th>Crédito Fiscal</th>
             <th>Monto de la Venta</th>
             <th>Concepto Venta</th>
             <th>Fecha Emisión</th>
             <th>Fecha Vencimiento</th>
             <th>Fecha en que se pagó</th>
             <th>-</th>
             <th>-</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($ventas as $ven)
         <tr>
             <td>{{$ven->id_venta}}</td>
             <td>{{$ven->nombre_cliente}}</td>
             <td>{{$ven->credito_fiscal}}</td>
             <th>${{number_format($ven->monto_ven, 2, ".",",")}}</th>
             <td>{{$ven->concepto_ven}}</td>
             <td>{{$ven->fecha_emision->format('d/m/Y')}}</td>
             <td>{{$ven->fecha_vencimiento->format('d/m/Y')}}</th>
             @if($ven->fecha_pago_venta!=null)
                <th style="background-color: #81b214;">
                    <button class="btn" style="background-color: #81b214;" onclick="editarP({{$ven->id_venta}}, '{{$ven->fecha_pago_venta->format('Y-m-d')}}')">
                        Fue cobrada el: {{$ven->fecha_pago_venta->format('d/m/Y')}}
                    </button>
                </th>
             @else
                @include('venta.btnCobrar')
             @endif
             <td>
                <input type="image" onclick="eluminarV({{$ven->id_venta}});"  class="btn-calc math sombra" height="40px" width="40px" 
                src="{{asset('assets/img/del.png')}}"/>
             </td>
             <td>
                 <input type="image" onclick="editarV({{$ven->id_venta}}, {{$ven->id_cliente}},'{{$ven->credito_fiscal}}', {{$ven->monto_ven}}, '{{$ven->concepto_ven}}', '{{$ven->fecha_emision->format('Y-m-d')}}', '{{$ven->fecha_vencimiento->format('Y-m-d')}}')" class="btn-calc math sombra" height="40px" width="40px" src="{{asset('assets/img/edi.png')}}"/>
            </td>
             
             
         </tr>    
         @endforeach
    </tbody>
</table>