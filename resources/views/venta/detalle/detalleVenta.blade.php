@extends('layouts.main', ['activePage' => 'venta', 'titlePage' => __('Detalles de la Venta')])
@section('title', 'Detalles de la venta')
@section('content')

<style>
    small{
        color: red;
        font-size: 15px;
    }
</style>



<div>
    <x-table>
        
            <div class="row justify-content-center pt-5">
                <h3 class="">Agregar detalles al documento de Venta: <b>{{$venta->credito_fiscal}}</b> </h3>
            </div>
            <div class="row justify-content-center ">
                <h3 class="">Nombre del cliente: <b>{{$venta->nombre_cliente}}</b>  </h3>
            </div>


        

        <div class="m-5 my-2">
            @include('venta.detalle.nuevoDetalle')
            
        </div>
        @include('venta.detalle.detalleTable')
    </x-table>
</div>

@endsection

@push('js')

  

    @if ($alerta == "create")
        <script>
            toastr["success"]("Detalle de Venta Creado Correctamente", "Operación correcta");
        </script>
    @endif

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
  

    @if ($errors->any())
        <script>
            toastr["error"]("Hay errores en los datos ingresados, Por favor echa un vistaso", "Error");
        </script>
    @endif

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

            $('#precio_unitario').on('change', function(){
                let = precioU = $('#precio_unitario').val();
                let = cant = $('#cantidad').val();

                let subT = (precioU*cant);
                $('#subTotal').val(subT);
               
            });
            
            
        });


       

         

    
   </script>


@endpush