@extends('layouts.main', ['activePage' => 'maestro-proveedor', 'titlePage' => __('Maestro Proveedor')])
@section('title', 'Maestro de Proveedor')

@section('content')
<style>
    b{
        color: red;
    }

            
</style>


@include('maestros.ProveedorModalDelete')
@include('maestros.proveedorModalUpdate')


<div>
    <x-table>
        <div class="row justify-content-center pt-5">
            <h4>Gestión de Maestros de Proveedores</h4>
        </div>
        <div class="m-5 my-2">
            <div class="pb-2">
            </div>
            <section style="margin: auto">
                <div class="container-fluid">
                    <input type="button" class="btn btn-info" value="Nuevo Maestro" id="btnNuenvoMaestro">

                    <div id="nuevoMaestro">
                        @include('maestros.formulario.nuevoMaestroProveedor')   
                    </div> 
                </div>
                <br>
                    
                    <div>
                        @include('maestros.proveedorTable')   
                    </div>
                    
                <br>

                
            </section>
        
        </div>
    </x-table>
</div>

@endsection

@push('js')

@if ($alerta == "create"){
    <script>
        toastr["success"]("Maestro Agregado Correctamente", "Operación correcta");
    </script>
}
@endif
@if ($alerta == "update")
    <script>
        toastr["success"]("Maestro Actualizado Correctamente", "Operación correcta");
        toastr["warning"]("Usted cambió los datos del maestro. Estos cambios no afectaran a las ventas registradas anteriormente a este cambio", "Operación correcta");
    </script>
@endif
@if ($alerta == "deleteError")
    <script>
        toastr["error"]("El maestro no se puede eliminar. Tiene Compras ligadas", "Error");
    </script>
@endif
@if ($alerta == "delete")
    <script>
        toastr["info"]("Maestro Eliminado Correctamente", "Operación correcta");
    </script>
@endif

<script type="text/javascript" src="{{asset('assets/js/maestroProveedor.js')}}"></script>

@endpush