<form action="{{route('venta.store')}}" method="POST">
    @csrf
    <div class="">
        <div class="row">
            <div class="col-6">
                <label>Cliente</label>
                <select id="" class="select-css" name="id_cliente" >
                    <option value="">Seleccione un cliente</option>
                    @foreach ($clientes as $c)
                        <option value="{{$c->id_cliente}}" {{ old('id_cliente') == $c->id_cliente ? 'selected' : '' }}>{{$c->nombre_cliente}}</option>
                    @endforeach
                </select>
                @error('id_cliente')
                        <small>*{{$message}}</small>
                    <br>
                @enderror
            </div>
            <div class="col-6">
                <label>Crédito Fiscal</label>
                <input type="text" class="txt-form" name="credito_fiscal" value="{{old('credito_fiscal')}}">
                @error('credito_fiscal')
                        <small>*{{$message}}</small>
                    <br>
                @enderror
            </div>
            <div class="col-6">
                <label>Monto Venta</label>
                <input type="number" class="txt-form" step="0.01" min="1" name="monto_ven" value="{{old('monto_ven')}}">
                @error('monto_ven')
                        <small>*{{$message}}</small>
                    <br>
                @enderror
            </div>
            <div class="col-6">
                <label>Concepto Venta</label>
                <input type="text" class="txt-form" maxlength="50" name="concepto_ven" value="{{old('concepto_ven')}}">
                @error('concepto_ven')
                        <small>*{{$message}}</small>
                    <br>
                @enderror
            </div>
            <div class="col-6">
                <label>Fecha Emisión</label>
                <input type="date" class="txt-form" maxlength="50" name="fecha_emision" value="{{old('fecha_emision')}}">
                @error('fecha_emision')
                        <small>*{{$message}}</small>
                    <br>
                @enderror
            </div>
            <div class="col-6">
                <label>Fecha Vencimiento</label>
                <input type="date" class="txt-form" maxlength="50" name="fecha_vencimiento" value="{{old('fecha_vencimiento')}}">
                @error('fecha_vencimiento')
                        <small>*{{$message}}</small>
                    <br>
                @enderror
            </div>
        </div>

        <div class="row justify-content-center">
            <input type="submit" value="Agregar Venta" class=" mt-5 btn btn-radius btn-azul">
        </div>
        
    </div>

</form>


@if ($errors->any())
    <script>
        document.getElementById('divNuevaVenta').style.display = 'block';
    </script>
@else
    <script>document.getElementById('divNuevaVenta').style.display = 'none';</script>  
@endif
    
