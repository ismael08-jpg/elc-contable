<form action="{{route('detalleVenta.create')}}" method="POST">
    @csrf
    <div class="row">
        <input type="hidden" value="{{$venta->id_venta}}" name="id_venta">

        <div class="col-md-6">
            <label>Descripción</label>
            <textarea maxlength="200" class="txt-form" name="descripcion"></textarea>
            @error('descripcion')
                        <small>*{{$message}}</small>
                    <br>
                    <br>
            @enderror
        </div>
        
        <div class="col-md-6">
            <label>Precio Unitario</label>
            <input type="text"  class="txt-form"  name="precio_unitario" id="precio_unitario" value="{{old('precio_unitario', 0)}}">
            @error('precio_unitario')
                        <small>*{{$message}}</small>
                    <br>
                    <br>
            @enderror
        </div>
        
        <div class="col-md-6">
            <label>Cantidad</label>
            <input type="text"   class="txt-form" name="cantidad" id="cantidad" value="{{old('cantidad', 0)}}">
            @error('cantidad')
                        <small>*{{$message}}</small>
                    <br>
                    <br>
            @enderror
        </div>
        
        <div class="col-md-6">
            <label>Presupuesto</label>
            <input type="text"  class="txt-form" name="presupuesto" value="{{old('presupuesto')}}">
            @error('presupuesto')
                        <small>*{{$message}}</small>
                    <br>
                    <br>
            @enderror
        </div>

        <div class="col-md-6">
            <label>Ventas no Sujetas</label>
            <input type="text"    class="txt-form" name="ventas_no_sujetas" value="{{old('ventas_no_sujetas', 0)}}">
            @error('ventas_no_sujetas')
                        <small>*{{$message}}</small>
                    <br>
                    <br>
            @enderror
        </div>

        <div class="col-md-6">
            <label>Ventas Grabadas</label>
            <input type="text"  value="0" class="txt-form" name="ventas_grabadas"  value="{{old('ventas_grabadas')}}">
            @error('ventas_grabadas')
                        <small>*{{$message}}</small>
                    <br>
                    <br>
            @enderror
        </div>

        <div class="col-md-6">
            <label>Sub-Total (auto)</label>
            <input type="text" step="0.01" value="0"  readonly class="txt-form" id="subTotal">
        </div>

       

    </div>

    <div class="mt-5 row justify-content-center">
        <input type="submit" value="Agregar Detalle" class="btn btn-radius" style="background-color: green">
    </div>


</form>


    