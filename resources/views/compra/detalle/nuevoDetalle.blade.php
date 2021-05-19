<div>
    <form action="{{route('detalleCompra.create')}}" method="POST">
        @csrf
        <!--Hidden inputs-->
        <input type="hidden" name="id_compra" value="{{$compra->id_compra}}">
        <div class="row">
            <div class="col-md-6">
                <label>Descripción</label>
                <input type="text" class="txt-form" name="descripcion" value="{{old('descripcion')}}">
                @error('descripcion')
                    <small>*{{$message}}</small>
                @enderror
            </div>
            <div class="col-md-6">
                <label>Precio Unitario</label>
                <input type="text" class="txt-form" name="precio_unitario" id="precioUnitario" value="{{old('precio_unitario', 0)}}">
                @error('precio_unitario')
                    <small>*{{$message}}</small>
                @enderror
            </div>
            <div class="col-md-6">
                <label>Cantidad</label>
                <input type="text" class="txt-form" name="cantidad" id="cantidad"  value="{{old('cantidad', 0)}}">
                @error('cantidad')
                    <small>*{{$message}}</small>
                @enderror
            </div>
            <div class="col-md-6">
                <label>Presupuesto</label>
                <input type="text" class="txt-form" name="presupuesto" value="{{old('presupuesto')}}">
                @error('presupuesto')
                    <small>*{{$message}}</small>
                @enderror
            </div>
            <div class="col-md-6">
                <label>Sub-total</label>
                <input type="text" class="txt-form" readonly  id="subTotal">
            </div>
        </div>
        <div class="mt-5 row justify-content-center">
            <input type="submit" value="Agregar compra" class="btn btn-radius btn-info" >
        </div>
    </form>
</div>