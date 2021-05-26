@extends('layouts.main', ['activePage' => 'maestro-cliente', 'titlePage' => __('Maestro Cliente')])
@section('title', 'Maestro de Cliente')
@section('content')
<style>
    b{
        color: red;
    }

    small{
        color: red;
    }

    

    
</style>


@include('maestros.modalDelete')
@include('maestros.modalUpdate')


<div>
    <x-table>
        <div class="row justify-content-center pt-5">
            <h3>Gestión de Maestros de Clientes</h3>
        </div>
        <div class="m-5 my-2">
            <div class="pb-2">
            </div>
            <section style="margin: auto">
                <div class="container-fluid">
                    
                    <input type="button" class="btn btn-info" value="Nuevo Maestro" id="btnNuenvoMaestro">
                    <div id="nuevoMaestro">
                        @include('maestros.formulario.nuevoMaestroCliente')
                        <button id="btnConfirm" class="btn">Enviar</button>
                    </div> 
                </div>
                <br>
                        
                        <div>
                            @include('maestros.clienteTable')   
                        </div>

                <br>
                @include('maestros.modals.confirmCliente')
                
            </section>
        
        </div>
    </x-table>
</div>

@endsection

@push('js')

@if ($errors->any())
    <script>
        toastr["error"]("Hay errores con los datos ingresados", "Error");
        $("#nuevoMaestro").show('slow'); 
        banderaHide = 1;
    </script>
@endif

@if ($errors->any() && $alerta == "modal")
    <script>
        toastr["error"]("Hay errores con los datos ingresados", "Error");
        $('#modalEdit').modal();  
    </script>
@endif

   
@if ($alerta == "create")
    <script>
        toastr["success"]("Maestro Agregado Correctamente", "Operación correcta");
    </script>

@endif
@if ($alerta == "update")
    <script>
        toastr["success"]("Maestro Actualizado Correctamente", "Operación correcta");
        toastr["warning"]("Usted cambió los datos del maestro. Estos cambios no afectaran a las ventas registradas anteriormente a este cambio", "Operación correcta");
    </script>
@endif
@if ($alerta == "deleteError")
    <script>
        toastr["error"]("El maestro no se puede eliminar. Tiene ventas ligadas", "Error");
    </script>
@endif
@if ($alerta == "delete")
    <script>
        toastr["warning"]("Maestro Eliminado Correctamente", "Operación correcta");
    </script>
@endif

<script>
   
    
</script>

<script src="{{asset('assets/js/maestroCliente.js')}}"></script>
<script src="{{asset('assets/js/validaciones/vCliente.js')}}"></script>

@endpush