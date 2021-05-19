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
            <form action="{{route('detalleCompra.update')}}" autocomplete="of" method="POST">
                @csrf
                @method('PUT')
                <div class="container">
                    <input type="hidden" name="uid_compra" value="{{$compra->id_compra}}">
                    <input type="hidden" name="uid_detalle_compra" id="uid_detalle_compra">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Descripción</label>
                            <input type="text" class="txt-form" name="udescripcion" id="udescripcion" value="{{old('udescripcion')}}">
                            @error('udescripcion')
                                <small>*{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label>Precio Unitario</label>
                            <input type="text" class="txt-form" name="uprecio_unitario" id="uprecio_unitario" value="{{old('uprecio_unitario', 0)}}">
                            @error('uprecio_unitario')
                                <small>*{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label>Cantidad</label>
                            <input type="text" class="txt-form" name="ucantidad" id="ucantidad"  value="{{old('ucantidad', 0)}}">
                            @error('ucantidad')
                                <small>*{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label>Presupuesto</label>
                            <input type="text" class="txt-form" name="upresupuesto" id="upresupuesto" value="{{old('upresupuesto')}}">
                            @error('upresupuesto')
                                <small>*{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label>Sub-total</label>
                            <input type="text" class="txt-form" readonly  id="usubTotal" name="usubTotal">
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