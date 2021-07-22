@extends('layouts.main', ['activePage' => 'venta', 'titlePage' => __('Venta')])
@section('title', 'Nueva Venta ELC')
@section('content')
<style>
    b{
        color: red;
    }

    small{
        color: red;
    }

    

    
</style>





<div>
    <x-table>
        
        <div class="row justify-content-center pt-5">
            <h3>Nueva Venta</h3>
        </div>

        <button class="btn btn-info" id="nwVenta">Nueva venta</button>
        <div id="divNuevaVenta">
            @include('venta.nuevaVenta')
        </div>

        <div class="m-5 my-2">
            
            @include('venta.ventaTable')   
            @include('venta.ventaModalUpdate')
            @include('venta.ventaModalDelete')
            @include('venta.pagarVentaModal')
            @include('venta.editarPagoVenta')
        </div>
    </x-table>
</div>

@endsection

@push('js')

    @if ($errors->any())
        <script>
            toastr["error"]("Hay algun error con los campos que usted ingresó", "Algo salió mal");
        </script>
    @endif

    @if ($alerta == "create")
        <script>
            toastr["success"]("Venta Creada correctamente", "Operación correcta");
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
    @if ($alerta == "errorDelete")
        <script>
            toastr["error"]("La venta tiene compras o detalles de compra ligados", "No se pudo eliminar");
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

            let NewVenta = document.getElementById("nwVenta");

            NewVenta.addEventListener("click", function(){
                document.getElementById('divNuevaVenta').style.display = 'block';
            });


            
        });


        function editarV(id_venta,id_cliente,credito_fiscal,monto_ven,concepto_ven,fecha_emision,fecha_vencimiento){

            $('#uId_cliente').val(id_cliente); 
            $('#uCredito_fiscal').val(credito_fiscal);
            $('#uMonto_ven').val(monto_ven);
            $('#uId_venta').val(id_venta);
            $('#uConcepto_ven').val(concepto_ven);
            $('#uFecha_emision').val(fecha_emision);
            $('#uFecha_vencimiento').val(fecha_vencimiento);   

            $('#ventaModalEdit').modal();
        }

        function eluminarV(id_venta){
            $('#dId_venta').val(id_venta); 
            $('#ventaModalDelete').modal();
            
        }

        function pagarV(id_venta){
            $('#pId_venta').val(id_venta); 
            $('#pagarVentaModal').modal();
        }
        
        function editarP(id_venta, epFecha_pago){
            $('#epId_venta').val(id_venta);
            $('#epFecha_pago').val(epFecha_pago);
            $('#editarPagarVentaModal').modal();
        }


       $('#usuarioTable').DataTable({
             
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

         

    
   </script>


@endpush
