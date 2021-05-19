@extends('layouts.main', ['activePage' => 'compra', 'titlePage' => __('Compras')])
@section('title', 'Compras de la venta')
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
                <h3 class="">Compras de la venta:  <b>{{$venta->credito_fiscal}}</b> </h3>
            </div>
        

        <div class="m-5 my-2">
            @include('compra.nuevaCompra')
            
        </div>
        @include('compra.compraTable')
        @include('compra.modals.update')
        @include('compra.modals.delete')

        
    </x-table>
</div>

@endsection
<!--
    $('#compraEdit').modal();
-->
@push('js')
    
    @if ($errors->any())
        <script>
            toastr["error"]("Hay errores en los datos ingresados, Por favor echa un vistaso", "Error");
        </script>
        
    @endif

    @if ($alerta == "create")
        <script>
            toastr["success"]("Compra Creada correctamente", "Operación correcta");
        </script>
    @endif
    @if ($alerta == "delete")
        <script>
            toastr["warning"]("Compra eliminada correctamente", "Operación correcta");
        </script>
    @endif
    
    @if ($alerta == "errorDelete")
        <script>
            toastr["error"]("Tienes que eliminar antes los detalles de esta compra", "No se pudo eliminar");
        </script>
    @endif

    @if ($alerta == "update")
        <script>
            toastr["success"]("Compra actualizada correctamente", "Operación correcta");
        </script>
    @endif

   <script src="{{asset('assets/js/compra.js')}}"></script>


@endpush