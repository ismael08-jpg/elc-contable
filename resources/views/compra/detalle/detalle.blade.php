@extends('layouts.main', ['activePage' => 'compra', 'titlePage' => __('Detalles del documento de compra')])
@section('title', 'Detalle de documento de compra')
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
                <h3 class="">Detalles del documento de compra: <b>{{$compra->credito_fiscal}} | </b> </h3>
                
            </div>
            <div class="row justify-content-center pt-2">
                <a href="{{route('compra.index', $compra->id_venta)}}"><- Regresar a gestión de compra</a>
            </div>
            
        <div class="m-5 my-2">
            @include('compra.detalle.nuevoDetalle')
            @include('compra.detalle.tableDetalle')
            @include('compra.detalle.modals.update')
            @include('compra.detalle.modals.delete')
            
        </div>
  

        
    </x-table>
</div>

@endsection


@push('js')
    
    @if ($errors->any())
        <script>
            toastr["error"]("Hay errores en los datos ingresados, Por favor echa un vistaso", "Error");
        </script>
        
    @endif

    @if ($alerta == "create")
        <script>
            toastr["success"]("Detalle de Compra Creada correctamente", "Operación correcta");
        </script>
    @endif
    @if ($alerta == "delete")
        <script>
            toastr["warning"]("Detalle de compra eliminada correctamente", "Operación correcta");
        </script>
    @endif
    
    @if ($alerta == "deleteError")
        <script>
            toastr["error"]("Tienes que eliminar antes los detalles de esta compra", "No se pudo eliminar");
        </script>
    @endif

    @if ($alerta == "update")
        <script>
            toastr["success"]("Detalle de compra actualizada correctamente", "Operación correcta");
        </script>
    @endif

   <script src="{{asset('assets/js/detalleCompra.js')}}"></script> 


@endpush