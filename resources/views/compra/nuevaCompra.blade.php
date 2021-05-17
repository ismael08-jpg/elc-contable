<form action="{{route('compra.create')}}" method="POST">
    @csrf
    <div class="row">

        <div class="col-md-6">
            <label>Proveedor</label>
            <select class="select-css" name="id_proveedor"></select>
            @error('id_proveedor')
            <small>*{{$message}}</small>
            @enderror
        </div>
        <div class="col-md-6">
            <label>Crédito Fiscal</label>
            <input type="text" class="txt-form" name="credito_fiscal">
            @error('credito_fiscal')
                <small>*{{$message}}</small>
            @enderror
        </div>
        <div class="col-md-6">
            <label>Monto de la compra</label>
            <input type="text" class="txt-form" name="monto_com">
            @error('monto_com')
                <small>*{{$message}}</small>
            @enderror
        </div>
        <div class="col-md-6">
            <label>Concepto</label>
            <input type="text" class="txt-form" name="concepto_com">
            @error('concepto_com')
            <small>*{{$message}}</small>
            @enderror
        </div>
        <div class="col-md-6">
            <label>Monto de la compra</label>
            <input type="text" class="txt-form" name="fecha_emision">
            @error('fecha_emision')
            <small>*{{$message}}</small>
            @enderror
        </div>
        <div class="col-md-6">
            <label>Monto de la compra</label>
            <input type="text" class="txt-form" name="fecha_vencimiento">
            @error('fecha_vencimiento')
            <small>*{{$message}}</small>
            @enderror
        </div>
    </div>

    <div class="mt-5 row justify-content-center">
        <input type="submit" value="Agregar Detalle" class="btn btn-radius" style="background-color: green">
    </div>

</form>