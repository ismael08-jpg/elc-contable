@extends('layouts.main', ['activePage' => 'estado', 'titlePage' => __('Estado')])
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
                <h3 class="">Estados con baja tributación<b>*</b> </h3>
            </div>
            

        

        <div class="m-5 my-2">
            
            
        </div>
        @include('estado.tableEstado')
        @include('estado.update')
        
    </x-table>
</div>

@endsection

@push('js')

    @if ($alerta == "update")
    <script>
        toastr["success"]("País actualizado correctamente", "Operación correcta");
    </script>
    @endif

    @if ($errors->any())
        <script>
            $('#estadoUpdate').modal();
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

          

            
            
        });

        function editar (id, nombre_estado, paraiso_fiscal){
            $('#id').val(id);
            $('#nombre_estado').val(nombre_estado);
           
            $('#paraiso_fiscal').val(paraiso_fiscal);

            $('#estadoUpdate').modal();
        }
       

    
   </script>


@endpush