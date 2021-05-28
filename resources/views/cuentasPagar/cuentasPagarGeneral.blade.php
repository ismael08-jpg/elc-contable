@extends('layouts.main', ['activePage' => 'pais', 'titlePage' => __('País')])
@section('title', 'Detalles de la venta')
@section('content')

<style>
    small{
        color: red;
        font-size: 15px;
    }

    thead, th{
        background-color: rgb(59, 48, 33);
        color: aliceblue;
    }
    td{
        border-left: solid black
    }
</style>



<div>
    <x-table>
        
            <div class="row justify-content-center pt-5">
                <h3 class="">Tuittlwb>*</b> </h3>
            </div>
            
            {{-- @foreach ($compras as $compra)
                {{$compra->cuentas_pagar->iva}}
            @endforeach --}}

            <table style="border-radius: 10px; text-align: center"  id="ventaTable"  class="table-striped align-items-center table table-responsive table-sm ">
                <thead >
                    <tr>
                         
                         <th>Credito Fiscal</th>
                         <th>Monto Compra</th>
                         <th>Nombre Proveedor</th>
                         <th>Concepto</th>
                         <th>Fecha Emisión</th>
                         <th>Fecha Vencimiento</th>
                         <th>IVA</th>
                         <th>Retencion</th>
                         <th> - </th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($compras as $compra)
                     <tr>
                        <td>{{$compra->credito_fiscal}}</td>
                        <td>{{$compra->monto_com}}</td>
                         <td>{{$compra->proveedor->nombre_proveedor}}</td>
                         <td>{{$compra->concepto_com}}</td>
                         <td>{{$compra->fecha_emision}}</td>
                         <td>{{$compra->fecha_vencimiento->format('d/m/Y')}}</td>
                         <td >{{$compra->cuentas_pagar->iva}}</td>
                         <td >{{$compra->cuentas_pagar->retencion}}</td>
                         <td>
                             <input type="image" onclick="" class="btn-calc math sombra" height="40px" width="40px" src="{{asset('assets/img/edi.png')}}"/>
                        </td>
                         
                         
                     </tr>    
                     @endforeach
                </tbody>
            </table>
        

        <div class="m-5 my-2">
            
            
        </div>
       
        
    </x-table>
</div>

@endsection

@push('js')

    

    
    {{-- 

    @if ($alerta == "delete")
        <script>
            toastr["warning"]("Venta eliminada correctamente", "Operación correcta");
        </script>
    @endif
    @if ($alerta == "update")
        <script>
            toastr["success"]("Venta actualizada correctamente", "Operación correcta");
        </script>
    @endif
    @if ($alerta == "pay")
        <script>
            toastr["success"]("Venta cobrada correctamente", "Operación correcta");
        </script>
    @endif
    @if ($alerta == "editPay")
        <script>
            toastr["success"]("Venta actualizada correctamente", "Operación correcta");
        </script>
    @endif
  

     --}}

   <script>

        $(document).ready(function(){
            
            $('#ventaTable').DataTable({
                
                responsive: true,
                autowidth: false,
        
                "language": {
                    "lengthMenu": "Mostrar _MENU_ registros por página",
                    "zeroRecords": "Nada encontrado - disculpa :(",
                    "info": "Mostrando la página _PAGE_ de _PAGES_",
                    "infoEmpty": "No hay registros disponibles",
                    "infoFiltered": "(filtrado de _MAX_ registros totales)",
                    "search": "Buscar:",
                    "paginate": {
                        "next": "Siguiente",
                        "previous": "Anterior",
                    }
                }
                   
            });

          

            
            
        });

        
       

    
   </script>


@endpush