<form action="{{route('compra.create')}}" method="POST">
    @csrf
    <div class="row">
        <!--Hiden inputs-->
        <input type="hidden" name="id_venta" value="{{$venta->id_venta}}">
        <div class="col-md-6">
            <label>Proveedor</label>
            <select class="select-css" name="id_proveedor">
                <option value="">Seleccione un proveedor para la compra</option>
                @foreach ($proveedor as $p)
                    <option value="{{$p->id_proveedor}}" {{ old('id_proveedor') == $p->id_proveedor ? 'selected' : '' }}>{{$p->nombre_proveedor}}</option>
                @endforeach
            </select>
            @error('id_proveedor')
            <small>*{{$message}}</small>
            @enderror
        </div>
        <div class="col-md-6">
            <label>Crédito Fiscal</label>
            <input type="text" class="txt-form" name="credito_fiscal" value="{{old('credito_fiscal')}}">
            @error('credito_fiscal')
                <small>*{{$message}}</small>
            @enderror
        </div>
        <div class="col-md-6">
            <label>Monto de la compra</label>
            <input type="text" class="txt-form" name="monto_com" value="{{old('monto_com')}}">
            @error('monto_com')
                <small>*{{$message}}</small>
            @enderror
        </div>
        <div class="col-md-6">
            <label>Concepto</label>
            <input type="text" class="txt-form" name="concepto_com" value="{{old('concepto_com')}}">
            @error('concepto_com')
            <small>*{{$message}}</small>
            @enderror
        </div>
        <div class="col-md-6">
            <label>Fecha emisión</label>
            <input type="date" class="txt-form" name="fecha_emision" value="{{old('fecha_emision')}}">
            @error('fecha_emision')
            <small>*{{$message}}</small>
            @enderror
        </div>
        <div class="col-md-6">
            <label>Fecha vencimiento</label>
            <input type="date" class="txt-form" name="fecha_vencimiento" value="{{old('fecha_vencimiento')}}">
            @error('fecha_vencimiento')
            <small>*{{$message}}</small>
            @enderror
        </div>
    </div>

    <div class="mt-5 row justify-content-center">
        <input type="submit" value="Agregar compra" class="btn btn-radius" style="background-color: green">
    </div>

</form>