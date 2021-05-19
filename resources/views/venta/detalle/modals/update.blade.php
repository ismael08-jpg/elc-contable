<!-- Modal -->
<div class="modal fade " id="detalleEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Actualizar datos de la compra</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('detalleVenta.update')}}" autocomplete="of" method="POST">
                @csrf
                @method('PUT')
                <div class="container">
                    <input type="hidden" name="uid_detalle_venta" id="uid_detalle_venta">
                    <div class="row">
                        <input type="hidden" value="{{$venta->id_venta}}" name="uid_venta" id="uid_venta">
                
                        <div class="col-md-6">
                            <label>Descripción</label>
                            <input type="text" maxlength="200" class="txt-form" name="udescripcion" id="udescripcion" value="{{old('udescripcion')}}">
                            @error('udescripcion')
                                        <small>*{{$message}}</small>
                                    <br>
                                    <br>
                            @enderror
                        </div>
                        
                        <div class="col-md-6">
                            <label>Precio Unitario</label>
                            <input type="text"  class="txt-form"  name="uprecio_unitario" id="uprecio_unitario" value="{{old('uprecio_unitario', 0)}}">
                            @error('uprecio_unitario')
                                        <small>*{{$message}}</small>
                                    <br>
                                    <br>
                            @enderror
                        </div>
                        
                        <div class="col-md-6">
                            <label>Cantidad</label>
                            <input type="text"   class="txt-form" name="ucantidad" id="ucantidad" value="{{old('ucantidad', 0)}}">
                            @error('ucantidad')
                                        <small>*{{$message}}</small>
                                    <br>
                                    <br>
                            @enderror
                        </div>
                        
                        <div class="col-md-6">
                            <label>Presupuesto</label>
                            <input type="text"  class="txt-form" name="upresupuesto" id="upresupuesto" value="{{old('upresupuesto')}}">
                            @error('upresupuesto')
                                        <small>*{{$message}}</small>
                                    <br>
                                    <br>
                            @enderror
                        </div>
                
                        <div class="col-md-6">
                            <label>Ventas no Sujetas</label>
                            <input type="text"    class="txt-form" name="uventas_no_sujetas" id="uventas_no_sujetas" value="{{old('uventas_no_sujetas', 0)}}">
                            @error('uventas_no_sujetas')
                                        <small>*{{$message}}</small>
                                    <br>
                                    <br>
                            @enderror
                        </div>
                
                        <div class="col-md-6">
                            <label>Ventas Grabadas</label>
                            <input type="text"  value="0" class="txt-form" name="uventas_grabadas" id="uventas_grabadas"  value="{{old('uventas_grabadas')}}">
                            @error('uventas_grabadas')
                                        <small>*{{$message}}</small>
                                    <br>
                                    <br>
                            @enderror
                        </div>
                
                        <div class="col-md-6">
                            <label>Sub-Total (auto)</label>
                            <input type="text" step="0.01" value="0"  readonly class="txt-form" id="usubTotal">
                        </div>
                
                       
                
                    </div>
                    
                </div>  
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Actualizar</button>
                </div>
            </form>

        </div>
    </div>

</div>